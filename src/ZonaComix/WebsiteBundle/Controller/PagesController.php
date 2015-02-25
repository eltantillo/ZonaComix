<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public function AdvantagesAction()
    {
        return $this->render('ZonaComixWebsiteBundle:Website:Pages/Advantages.html.twig');
    }
    public function PrivacyAction()
    {
        return $this->render('ZonaComixWebsiteBundle:Website:Pages/Privacy.html.twig');
    }
    public function UseAction()
    {
        return $this->render('ZonaComixWebsiteBundle:Website:Pages/Use.html.twig');
    }
}
