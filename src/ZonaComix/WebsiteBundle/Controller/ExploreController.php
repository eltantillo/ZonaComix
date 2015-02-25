<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ZonaComix\WebsiteBundle\Entity\Comic;

class ExploreController extends Controller
{
    public function indexAction(Request $request)
    {
        $comic = new Comic();

        $form = $this->createFormBuilder($comic)
            ->add('rating', 'choice', array(
                'label'   => 'Clasificación',
                'attr'    => array( 'help'=>'Elige la clasificación en la que desees buscar.' ),
                'choices' => array(
                    '%' => 'Todas',
                    '1' => 'Para todos',
                    '2' => 'Todos los mayores de 10+',
                    '3' => 'Adolescentes 12+',
                    '4' => 'Menores Maduros 17+',
                    '5' => 'Adultos 18+'
                )))
            ->add('genre', 'choice', array(
                'label'   => 'Género',
                'attr'    => array( 'help'=>'Elige el género del comic que desees buscar.' ),
                'choices' => array(
                    '%'  => 'Todos',
                    '1'  => 'Infantil',
                    '2'  => 'Ciencia-ficción',
                    '3'  => 'Humor',
                    '4'  => 'Superhéroes',
                    '5'  => 'Fantasía y aventura',
                    '6'  => 'Sobrenatural y paranormal',
                    '7'  => 'Serie negra o detectivesca',
                    '8'  => 'Bélico',
                    '9'  => 'Histórico y biográfico',
                    '10' => 'Underground',
                    '11' => 'Erótico'
                )))
            ->add('style', 'choice', array(
                'label'   => 'Estilo',
                'attr'    => array( 'help'=>'Elige el estilo de comic que deseas buscar.' ),
                'choices' => array(
                    '%' => 'Todos',
                    '1' => 'Comic',
                    '2' => 'Manga',
                )))
            ->add('license', 'choice', array(
                'label' => 'Licencia',
                'attr'  => array( 'help'=>'Filtra los resultados por el tipo de licencia.' ),
                'choices' => array(
                    '%' => 'Todas',
                    '1' => 'Atribución-NoComercial-SinDerivadas (CC BY-NC-ND)',
                    '2' => 'Atribución-NoComercial-CompartirIgual (CC BY-NC-SA)',
                    '3' => 'Atribución-NoComercial (CC BY-NC)',
                    '4' => 'Atribución-SinDerivadas (CC BY-ND)',
                    '5' => 'Atribución-CompartirIgual (CC BY-SA)',
                    '6' => 'Atribución (CC BY)'
                )))
            ->add('save', 'submit', array(
                'label' => 'Explorar',
                'attr'  => array( 'help'=>'text help'
                )))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('zona_comix_website_explore_results', array(
            'rating'  => $comic->getRating(),
            'genre'   => $comic->getGenre(),
            'style'   => $comic->getStyle(),
            'license' => $comic->getLicense()
            )));
        }

        return $this->render('ZonaComixWebsiteBundle:Website:Explore.html.twig', array(
        	'form' => $form->createView(),
        	));
    }

    public function ResultsAction($rating, $genre, $style, $license, $page){
        $em = $this->getDoctrine()->getManager();

        $comics = $em->getRepository('ZonaComixWebsiteBundle:Comic')
            ->createQueryBuilder('a')
            ->where('a.rating LIKE :rating AND a.genre LIKE :genre AND a.style LIKE :style AND a.license LIKE :license')
            ->setParameter('rating',  $rating)
            ->setParameter('genre',   $genre)
            ->setParameter('style',   $style)
            ->setParameter('license', $license)
            ->setMaxResults(10)
            ->setFirstResult( ($page - 1 ) * 10)
            ->getQuery()
            ->getResult();

        $comicsTotal = count($comics);

        if ($comicsTotal == 10){
            array_pop($comics);
        }

        return $this->render('ZonaComixWebsiteBundle:Website:ExploreResults.html.twig', array(
            'comics'  => $comics,
            'rating'  => $rating,
            'genre'   => $genre,
            'style'   => $style,
            'license' => $license,
            'page'    => $page,
            'entries' => $comicsTotal
            ));
    }
}
