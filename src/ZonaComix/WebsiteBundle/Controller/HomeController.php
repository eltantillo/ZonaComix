<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function CoverAction()
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_USER')){
    		return $this->render('ZonaComixWebsiteBundle:Website:Cover.html.twig');
    	}
        else{
        	return $this->redirect($this->generateUrl('zona_comix_website_home'));
        }
    }
    public function NewsFeedAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $followers = 0;
        $published = 0;
        $user = $this->getUser();
        $chaptersTotal = 0;

        if (false === $this->get('security.context')->isGranted('ROLE_USER')){
            $chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findBy( array(), array('publish_date' => 'DESC') );
        }
        else{
            $comics = array();
            foreach( $user->getUsersFollowing() as $artist){
                foreach( $artist->getComics() as $comic){
                    array_push( $comics, $comic->getId() );
                }
            }
            foreach( $user->getComicsFollowing() as $comic){
                if( false === array_search( $comic->getId(), $comics ) ){
                    array_push( $comics, $comic->getId() );
                }
            }
            $chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findByComic( $comics, array('publish_date' => 'DESC'), 11,( $page - 1 ) * 10 );
            $chaptersTotal = count($chapters);
            if ($chaptersTotal == 0){
                $chapters = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findBy( array(), array('publish_date' => 'DESC') );
                $chaptersTotal = count($chapters);
            }

            if ($chaptersTotal == 11){
                array_pop($chapters);
            }

            foreach( $user->getFollowers() as $follower ){
                $followers++;
            }

            foreach( $user->getComics() as $comics ){
                $published++;
            }
        }
        return $this->render('ZonaComixWebsiteBundle:Website:Home.html.twig', array(
            'user'      => $user,
            'followers' => $followers,
            'published' => $published,
            'chapters'  => $chapters,
            'page'      => $page,
            'entries'   => $chaptersTotal
            ));
    }
}
