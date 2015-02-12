<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComicController extends Controller
{
    public function indexAction($comic, $page)
    {
        $em       = $this->getDoctrine()->getManager();
        $user     = $this->getUser();
        $comic    = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
        $chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findByComic( $comic, array('number' => 'DESC'), 10,( $page - 1 ) * 9 );

        $chaptersTotal = count($chapters);

        if ($chaptersTotal == 10){
            array_pop($chapters);
        }

        $followers = 0;
        $following = false;

        foreach( $comic->getFollowers() as $follower ){
            $followers++;
            if ( $user != null ){
                if ( $follower->getId() == $user->getId() ){
                    $following = true;
                }
            }
        }

        return $this->render('ZonaComixWebsiteBundle:Website:Comic.html.twig', array(
        	'comic' => $comic,
        	'chapters' => $chapters,
            'followers' => $followers,
            'following' => $following,
            'page'    => $page,
            'entries' => $chaptersTotal
        	));
    }
}
