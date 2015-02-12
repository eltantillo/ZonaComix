<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('zona_comix_website_search_result', array(
            'filter' => '%' . $_POST['filter'] . '%'
            )));
    }

    public function ResultAction($filter, $page)
    {
    	$em = $this->getDoctrine()->getManager();

        $comics = $em->getRepository('ZonaComixWebsiteBundle:Comic')
            ->createQueryBuilder('a')
            ->where('a.title LIKE :search OR a.description LIKE :search')
            ->setParameter('search', $filter)
            ->setMaxResults(10)
            ->setFirstResult( ($page - 1 ) * 10)
            ->getQuery()
            ->getResult();

        $comicsTotal = count($comics);

        if ($comicsTotal == 10){
            array_pop($comics);
        }

        return $this->render('ZonaComixWebsiteBundle:Website:Search.html.twig', array(
        	'comics'  => $comics,
            'page'    => $page,
            'entries' => $comicsTotal,
            'filter'  => $filter
        	));
    }
}
