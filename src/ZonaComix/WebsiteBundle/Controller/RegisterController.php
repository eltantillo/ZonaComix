<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZonaComix\WebsiteBundle\Entity\User;
use \ZonaComix\WebsiteBundle\Entity\Revenue;
use Symfony\Component\Security\Core\SecurityContext;

class RegisterController extends Controller
{
    public function LoginAction(Request $request)
    {
    	$session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        return $this->render(
            'ZonaComixWebsiteBundle:Website:Login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

	public function RegisterAction($username, Request $request)
	{
		$user = new User();

		$form = $this->createFormBuilder($user)
			->add('username', 'text', array(
				'label' => 'Nombre de usuario',
				'attr'  => array( 'help'=>'Este es el nombre de usuario que se utilizará para iniciar sesión.'
				)))
			->add('email', 'email', array(
				'label' => 'Dirección de correo',
				'attr'  => array( 'help'=>'Ingresa una dirección de correo electrónico válida, ya que necesitamos que la verifiques para poder utilizar tu cuenta para publicar.'
				)))
			->add('password', 'repeated', array(
				'type'            => 'password',
				'invalid_message' => 'Las contraseñas no coinciden.',
				'options'         => array('attr' => array('class' => 'password-field')),
				'first_options'   => array('label' => 'Contraseña', 'attr'   => array( 'help'=>' Utiliza una contraseña segura, se recomienda utilizar al menos una mayúscula, un número y un caracter especial.')),
				'second_options'  => array('label' => 'Confirmar contraseña', 'attr'   => array( 'help'=>'Ingresa de nuevo la misma contraseña para confirmar.')),
				))
			->add('save', 'submit', array(
				'label' => 'Registrarse',
				'attr'  => array( 'help'=>'text help'
				)))
			->getForm();

		$form->handleRequest($request);

		if ($form->isValid()) {
			$em       = $this->getDoctrine()->getManager();
			$password = password_hash($user->getPassword(), PASSWORD_BCRYPT, array('cost' => 12));
			$now      = new \DateTime(date('d-m-Y', time()));

			$referral = $em->getRepository('ZonaComixWebsiteBundle:User')->findOneByUsername( $username );
			$user->setReferral( $referral );
			$user->setPassword( $password );
			$em->persist($user);
			$em->flush();

			$message = \Swift_Message::newInstance();
			$imgUrl = $message->embed(\Swift_Image::fromPath('images/FullLogo.png'));
			$message
			->setSubject('Validación de tu cuenta')
			->setFrom(array('contacto@zonacomix.com' => 'ZonaComix'))
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

			return $this->redirect($this->generateUrl('zona_comix_website_register_complete'));
		}

		return $this->render('ZonaComixWebsiteBundle:Website:Register.html.twig', array(
			'form' => $form->createView(),
			'username' => $username
			));
	}

	public function RegisterCompleteAction()
	{
		return $this->render('ZonaComixWebsiteBundle:Website:RegisterThanks.html.twig');
	}

	public function ValidateAccountAction($username, $key)
	{
		if (md5($username) == $key){
			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository('ZonaComixWebsiteBundle:User')->findOneByUsername($username);
		 
			if (!$user) {
				throw $this->createNotFoundException(
					'No se encontró al usuario ' . $username
				);
			}

			$user->setActive(1);
			$em->flush();

			$message = \Swift_Message::newInstance();
			$imgUrl = $message->embed(\Swift_Image::fromPath('images/FullLogo.png'));
			$message
			->setSubject('Bienvenido a ZonaComix')
			->setFrom(array('contacto@zonacomix.com' => 'ZonaComix'))
			->setTo( $user->getEmail() )
			->setContentType("text/html")
			->setBody(
				$this->renderView(
					'ZonaComixWebsiteBundle:Website:Mail/WelcomeMail.html.twig',
					array(
						'logo' => $imgUrl
					)
				)
			);
			$this->get('mailer')->send($message);

			return $this->render('ZonaComixWebsiteBundle:Website:ValidateThanks.html.twig');
		}
		else{
			return $this->render('ZonaComixWebsiteBundle:Website:ValidateError.html.twig');
		}
	}
}