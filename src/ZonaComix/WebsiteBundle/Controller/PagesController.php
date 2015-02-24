<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function AdvantagesAction()
    {
        return $this->render('ZonaComixWebsiteBundle:Website:Advantages.html.twig');
    }
}
