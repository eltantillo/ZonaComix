<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LibraryController extends Controller
{
    public function indexAction()
    {
    	$em   = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        return $this->render('ZonaComixWebsiteBundle:Website:Library/Library.html.twig', array(
        	'user' => $user
        	));
    }

    public function UsersAction($page)
    {
    	$em   = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $artists = array();
        foreach( $user->getUsersFollowing() as $artist){
            array_push( $artists, $artist->getId() );
        }

        $artists = $em->getRepository('ZonaComixWebsiteBundle:User')->findById( $artists, array(), 10,( $page - 1 ) * 9 );

        $artistsTotal = count( $artists );
        if ($artistsTotal > 10){
            array_pop($artists);
        }

        return $this->render('ZonaComixWebsiteBundle:Website:Library/Users.html.twig', array(
        	'artists' => $artists,
            'page'    => $page,
            'entries' => $artistsTotal
        	));
    }

    public function ComicsAction($page)
    {
    	$em   = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $comics = array();
        foreach( $user->getComicsFollowing() as $comic){
            array_push( $comics, $comic->getId() );
        }

        $comics = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findById( $comics, array(), 10,( $page - 1 ) * 9 );

        $comicsTotal = count( $comics );
        if ($comicsTotal > 10){
            array_pop($comics);
        }

        $readings = array();
        foreach( $comics as $comic ){
            array_push( $readings, $em->getRepository('ZonaComixWebsiteBundle:Reading')->findOneBy( array( 'user' => $user, 'comic' => $comic ) ));
        }

        return $this->render('ZonaComixWebsiteBundle:Website:Library/Comics.html.twig', array(
            'user'     => $user,
        	'comics'   => $comics,
            'page'     => $page,
            'entries'  => $comicsTotal,
            'readings' => $readings
        	));
    }
}
