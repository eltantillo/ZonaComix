<?php

namespace ZonaComix\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ComicInfoController extends FOSRestController
{
    public function ComicInfoAction()
    {
        $comic   = $this->get('request')->request->get('Comic');
        $chapter = $this->get('request')->request->get('Chapter');

        //echo();

        $em      = $this->getDoctrine()->getManager();
        $comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->find( $comic );
        $chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array( 'comic' => $comic, 'number' => $chapter ) );
        $response = new Response();
        $response->setContent('{"PagesNumber":' . $chapter->getPages() . ',"ReadStyle":' . $comic->getStyle() . '}');
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }
}