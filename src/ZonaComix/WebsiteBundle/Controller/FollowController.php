<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FollowController extends Controller
{
    public function FollowUserAction($username)
    {
        $em = $this->getDoctrine()->getManager();
    	$user = $this->getUser();
    	$artist = $em->getRepository('ZonaComixWebsiteBundle:User')->findOneByUsername( $username );

    	$user->addUsersFollowing( $artist );
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl('zona_comix_website_user', array( 'username' => $artist->getUsername() )));
    }

    public function FollowComicAction($comic)
    {
        $em = $this->getDoctrine()->getManager();
    	$user = $this->getUser();
    	$comic = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );

    	$user->addComicsFollowing( $comic );
        $em->persist($user);
        $em->flush();

        return $this->redirect($this->generateUrl('zona_comix_website_comic', array( 'comic' => $comic->getTitle() )));
    }

    public function UnfollowUserAction($username)
    {
        $em = $this->getDoctrine()->getManager();
    	$user = $this->getUser();
    	$artist = $em->getRepository('ZonaComixWebsiteBundle:User')->findOneByUsername( $username );

    	$user->removeUsersFollowing( $artist );
        $em->persist($user);
        $em->flush();

        //return $this->redirect($this->generateUrl('zona_comix_website_user', array( 'username' => $artist->getUsername() )));
        return $this->render('ZonaComixWebsiteBundle:Website:Unfollow.html.twig', array(
            'user' => true,
            'name' => $username,
            ));
    }

    public function UnfollowComicAction($comic)
    {
        $em = $this->getDoctrine()->getManager();
    	$user = $this->getUser();
    	$comic = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );

    	$user->removeComicsFollowing( $comic );
        $em->persist($user);
        $em->flush();

        //return $this->redirect($this->generateUrl('zona_comix_website_comic', array( 'comic' => $comic->getTitle() )));return $this->render('ZonaComixWebsiteBundle:Website:Unfollow.html.twig', array(
        return $this->render('ZonaComixWebsiteBundle:Website:Unfollow.html.twig', array(
            'user' => false,
            'name' => $comic->getTitle(),
            ));
    }
}
