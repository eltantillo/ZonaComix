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

        $em      = $this->getDoctrine()->getManager();
        $comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->find( 1 );
        $chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array( 'comic' => $comic, 'number' => $chapter ) );
        
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, new JsonEncoder());

        $info = $serializer->serialize($chapter, 'json');

        $response = new Response();
        $response->setContent($info);
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }
}