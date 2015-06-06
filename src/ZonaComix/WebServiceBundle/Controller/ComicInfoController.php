<?php

namespace ZonaComix\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ComicInfoController extends FOSRestController
{
    public function ComicInfoAction()
    {
        /*$comic   = $this->get('request')->request->get('Comic');
        $chapter = $this->get('request')->request->get('Chapter');

        $response = new Response();
        $response->setContent("Holis");
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;*/
        return new Response();
    }
}