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
        $comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByID( $comic );
        $chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array( 'comic' => $comic, 'number' => $chapter ) );
        
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        
        $info = $serializer->serialize($chapter, 'json');

        $response = new Response();
        $response->setContent($info);
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }
}