<?php

namespace ZonaComix\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use ZonaComix\WebsiteBundle\Entity\Reading;

class ReadController extends Controller
{
	public function indexAction($comic, $chapter, $page)
	{
		$user    = $this->getUser();
		$Pay     = 0.0050;
		$em	     = $this->getDoctrine()->getManager();
		$comic   = $em->getRepository('ZonaComixWebsiteBundle:Comic')->findOneByTitle( $comic );
		$chapter = $em->getRepository('ZonaComixWebsiteBundle:Chapter')->findOneBy( array( 'comic' => $comic, 'number' => $chapter ) );

		if ($chapter != null && $chapter->getVisible() != 0){
			$ID = $chapter->getId();

		    $request = $this->get('request');
		    $cookies = $request->cookies;
			$response = new Response();

		    if (!$cookies->has('chapter' . $ID))
		    {
			    $response->headers->setCookie(new Cookie('chapter' . $ID, 1, time() + 31536000));
			    $response->send();
		    }
		    else if ($cookies->get('chapter' . $ID) == 1){
		    	$revenue = $comic->getUser()->getRevenue();
		    	$referralrevenue = null;
		    	if ($comic->getUser()->getreferral() != null){
					$referralrevenue = $comic->getUser()->getreferral()->getRevenue();
		    	}

				$chapter->setReadings( $chapter->getReadings() + 1 );
				$revenue->setFunds($revenue->getFunds() +  $Pay);
				$revenue->setEarnings($revenue->getEarnings() +  $Pay);

				if ($referralrevenue != null){
					$referralrevenue->setFunds($referralrevenue->getFunds() +  ($Pay * 0.03));
					$referralrevenue->setEarnings($referralrevenue->getEarnings() +  ($Pay * 0.03));
				}
				$em->persist($chapter);
				$em->flush();

			    $response->headers->setCookie(new Cookie('chapter' . $ID, 2, time() + 31536000));
			    $response->send();
		    }

			$files = scandir( 'comics/' . $comic->getId() . '/' . $chapter->getNumber() );
			$files = array_values($files);
			$pages = count($files) - 4;

	        $next  = 0;
			if (file_exists( 'comics/' . $comic->getId() . '/' . ($chapter->getNumber() + 1) . '/' )){
				$next = 1;
			}

			if ($user != null){
				$reading = $em->getRepository('ZonaComixWebsiteBundle:Reading')->findOneBy( array( 'user' => $user, 'comic' => $comic ) );
				if ($reading != null){
					if ($reading->getChapter() < $chapter->getNumber()){
						$reading->setChapter( $chapter->getNumber() );
						$reading->setPage( $page );
						$em->persist( $reading );
					}
					else if ( $reading->getChapter() == $chapter->getNumber() && $reading->getPage() < $page ){
						$reading->setPage( $page );
						$em->persist( $reading );
					}
				}
				else{
					$reading = new Reading();
					$reading->setUser( $user );
					$reading->setComic( $comic );
					$reading->setChapter( $chapter->getNumber() );
					$reading->setPage( $page );
					$user->addReading( $reading );
					$em->persist( $user );
					$em->persist( $reading );
				}
					$em->flush();
			}

			return $this->render('ZonaComixWebsiteBundle:Website:Read.html.twig', array(
				'comic'   => $comic,
				'chapter' => $chapter,
				'page'    => $page,
				'pages'   => $pages,
				'next'    => $next,
				));
		}
		else{
			return $this->render('ZonaComixWebsiteBundle:Website:ReadError.html.twig', array(
				'comic'   => $comic,
				));
		}
	}
}
