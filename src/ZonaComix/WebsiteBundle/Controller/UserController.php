<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction($username, $page)
    {
        $em     = $this->getDoctrine()->getManager();
        $user   = $this->getUser();
        $artist = $em->getRepository('ZonaComixWebsiteBundle:User')->findOneByUsername( $username );
        $comics = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findByUser( $artist, array(), 10,( $page - 1 ) * 9 );

        $comicsTotal = count($comics);

        if ($comicsTotal == 10){
            array_pop($comics);
        }

        $followers = 0;
        $following = false;

        foreach( $artist->getFollowers() as $follower ){
            $followers++;
            if ( $user != null ){
                if ( $follower->getId() == $user->getId() ){
                    $following = true;
                }
            }
        }

        return $this->render('ZonaComixWebsiteBundle:Website:User.html.twig', array(
        	'artist'    => $artist,
        	'comics'    => $comics,
            'followers' => $followers,
            'following' => $following,
            'page'      => $page,
            'entries'   => $comicsTotal
        	));
    }
}
