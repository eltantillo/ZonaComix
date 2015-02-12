<?php

namespace ZonaComix\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use ZonaComix\WebsiteBundle\Entity\Comic;

class DefaultController extends FOSRestController
{
    public function loginAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZonaComixWebsiteBundle:User')->find(1);
        $statusCode = 200;

        $view = $this->view($entity, $statusCode);
        return $this->handleView($view);
    }
}