<?php

namespace ZonaComix\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ComicInfoController extends FOSRestController
{
    public function ComicInfoAction()
    {
        $comic   = (int)$this->get('request')->request->get('Comic');
        $chapter = (int)$this->get('request')->request->get('Chapter');

        $em      = $this->getDoctrine()->getManager();
        $Comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->find( 1 );
        $Chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array( 'comic' => $Comic, 'number' => 1 ) );
        
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $ComicInfo = $serializer->serialize($Comic, 'json');
        $ChapterInfo = $serializer->serialize($Chapter, 'json');

        $response = new Response();
        $response->setContent("Manga: " . $Comic->getStyle() . "Pages: " . $Chapter->getPages());
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;
    }
}