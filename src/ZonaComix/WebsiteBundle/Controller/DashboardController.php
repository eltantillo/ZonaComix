<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use ZonaComix\WebsiteBundle\Entity\Comic;
use ZonaComix\WebsiteBundle\Entity\Chapter;

class DashboardController extends Controller
{
	public function indexAction()
	{
		return $this->redirect($this->generateUrl('zona_comix_website_dashboard_profile'));
		//return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig');
	}
	
	public function ReferralAction()
	{
		$user = $this->getUser();
		return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Referral.html.twig', array(
			'user' => $user,
			));
	}
	
	public function RevenueAction()
	{
		$user = $this->getUser();
		return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Revenue.html.twig', array(
			'user' => $user,
			));
	}
	
	public function ProfileAction(Request $request)
	{
		$user = $this->getUser();

		$form = $this->createFormBuilder($user)
			/*->add('email', 'email', array(
				'label' => 'Dirección de correo',
				'attr'   => array(
					'help'=>'Ingresa una dirección de correo electrónico válida, ya que necesitamos que la verifiques para poder utilizar tu cuenta para publicar.',
					'value' => $user->getEmail()
				)))
			->add('password', 'repeated', array(
				'type' => 'password',
				'invalid_message' => 'Las contraseñas no coinciden.',
				'options' => array('attr' => array('class' => 'password-field')),
				'first_options'  => array('label' => 'Cambiar contraseña', 'attr'   => array( 'value' => '', 'help'=>' Utiliza una contraseña segura, se recomienda utilizar al menos una mayúscula, un número y un caracter especial.')),
				'second_options' => array('label' => 'Confirmar contraseña', 'attr'   => array( 'value' => '', 'help'=>'Ingresa de nuevo la misma contraseña para confirmar.')),
				))*/
			->add('display_name', 'text', array(
				'label'	=> 'Nombre para mostrar',
				'required' => false,
				'attr'	 => array(
					'help' =>'Este es el nombre que se mostrará a los demás usuarios. Si no se define se utilizará tu nombre de usuario.',
					'value'=> $user->getDisplayName()
				)))
			->add('phrase', 'text', array(
				'label'	=> 'Frase corta',
				'required' => false,
				'attr'	 => array(
					'help' =>'Escribe una frase corta que te describa a ti, a tus comics, a tu estilo de arte o lo que quieras.',
					'value'=> $user->getPhrase()
				)))
			->add('website', 'url', array(
				'label'	=> 'Sitio web',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu sitio web.',
					'value'=> $user->getWebsite()
				)))
			->add('facebook', 'url', array(
				'label'	=> 'Facebook',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de Facebook.',
					'value'=> $user->getFacebook()
				)))
			->add('twitter', 'url', array(
				'label'	=> 'Twitter',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de Twitter.',
					'value'=> $user->getTwitter()
				)))
			->add('google', 'url', array(
				'label'	=> 'Google+',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de Google+.',
					'value'=> $user->getGoogle()
				)))
			->add('tumblr', 'url', array(
				'label'	=> 'Tumblr',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de Tumblr.',
					'value'=> $user->getTumblr()
				)))
			->add('deviantART', 'url', array(
				'label'	=> 'deviantArt',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de deviantArt.',
					'value'=> $user->getDeviantART()
				)))
			->add('youTube', 'url', array(
				'label'	=> 'YouTube',
				'required' => false,
				'attr'	 => array(
					'help' =>'La dirección de tu perfil de YouTube.',
					'value'=> $user->getYoutube()
				)))
			->add('avatar', 'file', array(
				'label'	=> 'Imagen para mostrar', //<img src="avatars/' . $user->getUsername() . '.jpg">
				'required' => false,
				'mapped'   => false,
				'attr'	 => array(
					'help' =>'Esta imagen es la que se mostrará en tu perfil y en todas tus publicaciones. Se recomienda una imagen de 200 x 200 píxeles.'
				)))
			->add('save', 'submit', array(
				'label' => 'Actualizar',
				'attr'  => array( 'help' =>'text help'
				)))
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($user);
			$em->flush();

			if ($form['avatar']->getData() != null){
				$form['avatar']->getData()->move( 'avatars', $user->getId() . '.jpg' );
			}
			return $this->redirect($this->generateUrl('zona_comix_website_dashboard_profile'));
		}

		return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Profile.html.twig', array(
			'form' => $form->createView()
			));
	}
	
	public function ComicsAction($page)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser();
		$comics = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findByuser( $user, array(), 10,( $page - 1 ) * 9 );

		$comicsTotal = count($comics);

		if ($comicsTotal == 10){
			array_pop($comics);
		}

		return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Comics.html.twig', array(
			'comics'  => $comics,
			'page'	=> $page,
			'entries' => $comicsTotal
			));
	}
	
	public function ChaptersAction($comic, $page)
	{
		$em       = $this->getDoctrine()->getManager();
		$user     = $this->getUser();
		$comic    = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
		$chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findByComic( $comic, array('number' => 'DESC'), 10,( $page - 1 ) * 9 );

		if( $comic->getUser() == $user ){
			$chaptersTotal = count($chapters);

			if ($chaptersTotal == 10){
				array_pop($chapters);
			}
			
			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/Chapters.html.twig', array(
				'comic'	=> $comic->getTitle(),
				'chapters' => $chapters,
				'page'	 => $page,
				'entries'  => $chaptersTotal
				));
			}
			else{
				return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/AccessViolation.html.twig');
			}
	}
	
	public function NewComicAction(Request $request)
	{
		$user = $this->getUser();

		if ($user->getActive() == 1){
			$comic = new Comic();

			$form = $this->createFormBuilder($comic)
				->add('title', 'text', array(
					'label' => 'Título',
					'attr'   => array( 'help'=>'Este es el nombre que recibirá tu nuevo comic. El nombre no puede ser idéntico a ninguno de los comics publicados en ZonaComix.'
					)))
				->add('cover', 'file', array(
					'label'  => 'Portada',
					'attr'   => array( 'help'=>'Esta es la imagen de portada que se mostrará para el comic.' ),
					'mapped' => false
					))
				->add('description', 'text', array(
					'label' => 'Descripción',
					'attr'   => array( 'help'=>'Esta es una pequeña descripción o reseña de tu comic. Le ayuda a los lectores a darse una idea general de la temática de tu comic.' ),
					))
				->add('rating', 'choice', array(
					'label' => 'Clasificación',
					'attr'   => array( 'help'=>'Elige el tipo de clasificación que mejor se adapte a tu comic. Esto nos ayuda a mostrárselo a la audiencia más adecuada.' ),
					'choices'   => array(
						'1' => 'G - Todos los públicos',
						'2' => 'PG - Guía Paternal Sugerida',
						'3' => 'PG-13 - Guía Paternal Estricta',
						'4' => 'R - Restringido',
						'5' => 'NC-17 - Prohibido para audiencia de 17 o menos'
					)))
				->add('genre', 'choice', array(
					'label' => 'Género',
					'attr'   => array( 'help'=>'Elige el género de tu Comic.' ),
					'choices'   => array(
						'1' => 'Infantil',
						'2' => 'Ciencia-ficción',
						'3' => 'Humor',
						'4' => 'Superhéroes',
						'5' => 'Fantasía y aventura',
						'6' => 'Sobrenatural y paranormal',
						'7' => 'Serie negra o detectivesca',
						'8' => 'Bélico',
						'9' => 'Histórico y biográfico',
						'10' => 'Underground',
						'11' => 'Erótico'
					)))
				->add('style', 'choice', array(
					'label' => 'Estilo',
					'attr'   => array( 'help'=>'Elige el estilo en el que se presenta tu Comic.' ),
					'choices'   => array(
						'1' => 'Comic',
						'2' => 'Manga',
					)))
				->add('license', 'choice', array(
					'label' => 'Licencia',
					'attr'   => array( 'help'=>'Esta es la licencia bajo la que se encontrará protegido tu comic. Elige la que más te convenga.' ),
					//<a href="https://creativecommons.org/licenses/?lang=es" target="_blank">Pulsa aquí</a> para leer más sobre las licencias Creative Commons y sus diversos tipos.
					'choices'   => array(
						'1' => 'Atribución-NoComercial-SinDerivadas (CC BY-NC-ND)',
						'2' => 'Atribución-NoComercial-CompartirIgual (CC BY-NC-SA)',
						'3' => 'Atribución-NoComercial (CC BY-NC)',
						'4' => 'Atribución-SinDerivadas (CC BY-ND)',
						'5' => 'Atribución-CompartirIgual (CC BY-SA)',
						'6' => 'Atribución (CC BY)'
					)))
				->add('save', 'submit', array(
					'label' => 'Crear Comic',
					'attr'   => array( 'help'=>'text help'
					)))
				->getForm();

			$form->handleRequest($request);

			if ($form->isValid()) {
				$comic->setUser( $user );
				$em = $this->getDoctrine()->getManager();
				$em->persist($comic);
				$em->flush();

				$NewDir = 'comics/' . $comic->getId();
				$fs = new Filesystem();
				$fs->mkdir( $NewDir );

				$form['cover']->getData()->move( $NewDir, "cover.jpg" );

				return $this->redirect($this->generateUrl('zona_comix_website_dashboard_comics'));
			}

			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/NewComic.html.twig', array(
				'form' => $form->createView(),
			));
		}
		else{
			$message = \Swift_Message::newInstance();
			$imgUrl = $message->embed(\Swift_Image::fromPath('images/FullLogo.png'));
			$message
			->setSubject('Validación de tu cuenta')
			->setFrom(array('contacto@zonacomix.com' => 'Zona Comix'))
			->setTo( $user->getEmail() )
			->setContentType("text/html")
			->setBody(
				$this->renderView(
					'ZonaComixWebsiteBundle:Website:Mail/ValidateMail.html.twig',
					array(
						'username' => $user->getUsername(),
						'key'	  => md5( $user->getUsername() ),
						'logo'	 => $imgUrl
					)
				)
			);
			$this->get('mailer')->send($message);

			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/NotValidAccount.html.twig');
		}
	}
	
	public function NewChapterAction($comic, Request $request)
	{
		$chapter = new Chapter();

		$form = $this->createFormBuilder($chapter)
			->add('title', 'text', array(
				'label'    => 'Título',
				'required' => false,
				'attr'     => array( 'help'=>'Este es el título que recibirá tu nuevo capítulo.'
				)))
			->add('file', 'file', array(
				'label'  => 'Archivo Zip',
				'attr'   => array( 'help'=>'Archivo .zip con las imágenes del comic. Hasta 64MB. Asegúrate de que las imágenes no se encuentren dentro de carpetas en el archivo.' ),
				'mapped' => false
				))
			->add('visible', 'checkbox', array(
				'label'    => 'Visible al público',
				'required' => false,
				'attr'     => array(
					'help'    =>'Determina si deseas que el capítulo se muestre al público en cuanto termines de publicarlo.',
					'checked' => true
				)))
			->add('save', 'submit', array(
				'label'   => 'Crear Nuevo Capítulo'
				))
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			//$now = new \DateTime(date('d-m-Y H:i:s', time()));

			$em = $this->getDoctrine()->getManager();
			$comic = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
			$chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findByComic( $comic );

			$chapter->setComic( $comic );
			$chapter->setNumber( count( $chapters ) + 1 );

			$NewDir = 'comics/' . $comic->getId() . '/' . $chapter->getNumber();
			$fs = new Filesystem();
			$fs->mkdir( $NewDir );

			$form['file']->getData()->move( $NewDir, "chapter.cbr" );

			$file = $NewDir . '/chapter.cbr';

			$zip = new \ZipArchive;
			$zip->open( $NewDir . '/chapter.cbr' );
			$zip->extractTo( $NewDir );
			$zip->close();

			$files = scandir( $NewDir );

			if (($key = array_search('.', $files)) !== false) {
				unset($files[$key]);
			}

			if (($key = array_search('..', $files)) !== false) {
				unset($files[$key]);
			}

			if (($key = array_search('chapter.cbr', $files)) !== false) {
				unset($files[$key]);
			}

			$files = array_values($files);
			usort( $files, 'strnatcmp' );
			
			for ($i = 0; $i < count( $files ); $i++) {
				rename( $NewDir . '/' . $files[$i], $NewDir . '/' . $i.".jpg" );
			}
			$chapter->setPages( count( $files ) );
			$em->persist($chapter);
			$em->flush();

			return $this->redirect($this->generateUrl('zona_comix_website_dashboard_model_chapter', array('comic' => $comic->getId(), 'chapter' => $chapter->getNumber(), 'pages' => count( $files ))));
		}

		return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/NewChapter.html.twig', array(
			'form' => $form->createView(),
			'comic' => $comic
			));
	}
	
	public function EditComicAction(Request $request, $comic)
	{
		$em    = $this->getDoctrine()->getManager();
		$comic = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
		$user  = $this->getUser();

		if( $comic->getUser() == $user ){
			$form = $this->createFormBuilder($comic)
				->add('title', 'text', array(
					'label' => 'Título',
					'attr'   => array( 'help'=>'Este es el nombre que recibirá tu nuevo comic. El nombre no puede ser idéntico a ninguno de los comics publicados en ZonaComix.'
					)))
				->add('cover', 'file', array(
					'label'  => 'Portada',
					'required' => false,
					'attr'   => array( 'help'=>'Esta es la imagen de portada que se mostrará para el comic.' ),
					'mapped' => false
					))
				->add('description', 'text', array(
					'label' => 'Descripción',
					'attr'   => array( 'help'=>'Esta es una pequeña descripción o reseña de tu comic. Le ayuda a los lectores a darse una idea general de la temática de tu comic.' ),
					))
				->add('rating', 'choice', array(
					'label' => 'Clasificación',
					'attr'   => array( 'help'=>'Elige el tipo de clasificación que mejor se adapte a tu comic. Esto nos ayuda a mostrárselo a la audiencia más adecuada.' ),
					'choices'   => array(
						'1' => 'G - Todos los públicos',
						'2' => 'PG - Guía Paternal Sugerida',
						'3' => 'PG-13 - Guía Paternal Estricta',
						'4' => 'R - Restringido',
						'5' => 'NC-17 - Prohibido para audiencia de 17 o menos'
					)))
				->add('genre', 'choice', array(
					'label' => 'Género',
					'attr'   => array( 'help'=>'Elige el género de tu Comic.' ),
					'choices'   => array(
						'1' => 'Infantil',
						'2' => 'Ciencia-ficción',
						'3' => 'Humor',
						'4' => 'Superhéroes',
						'5' => 'Fantasía y aventura',
						'6' => 'Sobrenatural y paranormal',
						'7' => 'Serie negra o detectivesca',
						'8' => 'Bélico',
						'9' => 'Histórico y biográfico',
						'10' => 'Underground',
						'11' => 'Erótico'
					)))
				->add('style', 'choice', array(
					'label' => 'Estilo',
					'attr'   => array( 'help'=>'Elige el estilo en el que se presenta tu Comic.' ),
					'choices'   => array(
						'1' => 'Comic',
						'2' => 'Manga',
					)))
				->add('license', 'choice', array(
					'label' => 'Licencia',
					'attr'   => array( 'help'=>'Esta es la licencia bajo la que se encontrará protegido tu comic. Elige la que más te convenga.' ),
					//<a href="https://creativecommons.org/licenses/?lang=es" target="_blank">Pulsa aquí</a> para leer más sobre las licencias Creative Commons y sus diversos tipos.
					'choices'   => array(
						'1' => 'Atribución-NoComercial-SinDerivadas (CC BY-NC-ND)',
						'2' => 'Atribución-NoComercial-CompartirIgual (CC BY-NC-SA)',
						'3' => 'Atribución-NoComercial (CC BY-NC)',
						'4' => 'Atribución-SinDerivadas (CC BY-ND)',
						'5' => 'Atribución-CompartirIgual (CC BY-SA)',
						'6' => 'Atribución (CC BY)'
					)))
				->add('save', 'submit', array(
					'label' => 'Editar Comic',
					'attr'   => array( 'help'=>'text help'
					)))
				->getForm();

			$form->handleRequest($request);

			if ($form->isValid()) {
				$em->persist($comic);
				$em->flush();

				if ($form['cover']->getData() != null){
					$NewDir = 'comics/' . $comic->getId();
					$form['cover']->getData()->move( $NewDir, "cover.jpg" );
				}

				return $this->redirect($this->generateUrl('zona_comix_website_dashboard_comics'));
			}

			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/EditComic.html.twig', array(
				'comic' => $comic,
				'form'  => $form->createView(),
			));
		}
		else{
			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/AccessViolation.html.twig');
		}
	}
	
	public function EditChapterAction(Request $request, $comic, $chapter)
	{
		$em      = $this->getDoctrine()->getManager();
		$comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
		$chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array(
			'comic'  => $comic,
			'number' => $chapter
		));
		$user    = $this->getUser();

		if( $comic->getUser() == $user ){

			$form = $this->createFormBuilder($chapter)
				->add('title', 'text', array(
					'label'    => 'Título',
					'required' => false,
					'attr'     => array( 'help'=>'Este es el título que recibirá tu nuevo capítulo.'
					)))
				->add('file', 'file', array(
					'label'    => 'Archivo Zip',
					'required' => false,
					'attr'     => array( 'help'=>'Archivo .zip con las imágenes del comic.' ),
					'mapped'   => false
					))
				->add('visible', 'checkbox', array(
					'label'    => 'Visible al público',
					'required' => false,
					'attr'     => array(
						'help'    =>'Determina si deseas que el capítulo se muestre al público.'
					)))
				->add('save', 'submit', array(
					'label' => 'Editar Capítulo',
					'attr'  => array( 'help'=>'text help'
					)))
				->getForm();

			$form->handleRequest($request);

			if ($form->isValid()) {
				if ($form['file']->getData() != null){
					$NewDir = 'comics/' . $comic->getId() . '/' . $chapter->getNumber();

					$files = glob( $NewDir . '/*' );
					foreach($files as $file){
						if(is_file($file)){
							unlink($file);
						}
					}

					$form['file']->getData()->move( $NewDir, "chapter.cbr" );

					$zip = new \ZipArchive;
					$zip->open( $NewDir . '/chapter.cbr' );
					$zip->extractTo( $NewDir );
					$zip->close();

					$files = scandir( $NewDir );

					if (($key = array_search('.', $files)) !== false) {
						unset($files[$key]);
					}

					if (($key = array_search('..', $files)) !== false) {
						unset($files[$key]);
					}

					if (($key = array_search('chapter.cbr', $files)) !== false) {
						unset($files[$key]);
					}

					$files = array_values($files);
					usort( $files, 'strnatcmp' );
					
					for ($i = 0; $i < count( $files ); $i++) {
						rename( $NewDir . '/' . $files[$i], $NewDir . '/' . $i.".jpg" );
					}
					$chapter->setPages( count( $files ) );
				}
				$em->persist($chapter);
				$em->flush();

				return $this->redirect($this->generateUrl('zona_comix_website_dashboard_chapters', array( 'comic' => $comic->getTitle() )));
			}

			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/EditChapter.html.twig', array(
				'chapter' => $chapter,
				'form'    => $form->createView(),
			));
		}
		else{
			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/AccessViolation.html.twig');
		}
	}

	public function ModelChapterAction($comic, $chapter, $pages)
	{
		$em      = $this->getDoctrine()->getManager();
		$comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneById( $comic );
		$chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array(
			'comic'  => $comic,
			'number' => $chapter
		));
		$user    = $this->getUser();

		if( $comic->getUser() == $user ){
			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/ModelChapter.html.twig', array(
				'chapter' => $chapter
				));
		}
		else{
			return $this->render('ZonaComixWebsiteBundle:Website:Dashboard/AccessViolation.html.twig');
		}
	}
}
