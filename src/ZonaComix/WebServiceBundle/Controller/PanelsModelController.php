<?php

namespace ZonaComix\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PanelsModelController extends FOSRestController
{
    public function SavePanelsAction()
    {
        $comic   =  $this->get('request')->request->get('Comic');
        $chapter = $this->get('request')->request->get('Chapter');
        $json    =  $this->get('request')->request->get('JSON');

        $ChapterModel = fopen("comics/" . $comic . "/" . $chapter . "/ChapterModel.zc", "w");
        fwrite($ChapterModel, $json);
        fclose($ChapterModel);

        /*$response = new Response();
        $response->setContent($this->get('request')->request->get('JSON'));
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(Response::HTTP_OK);
        return $response;*/
        return new Response();
    }
}