<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Forum controller.
 *
 */
class ForumController extends Controller
{
    /**
     * Lists all Forum entities.
     *
     */
    public function indexAction()
    {
	/*
    if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException('Vous ne pouvez pas accéder à cette partie du site sans être connecté');
    }
	*/
		
	    $em = $this->getDoctrine()->getEntityManager();
        $categories = $em->getRepository('LibertribesForumBundle:Category')->findAll();
		$topics = $em->getRepository('LibertribesForumBundle:Topic')->findAll();
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
        return $this->render('LibertribesForumBundle:Forum:index.html.twig', array(
            'categories' => $categories, 'topics' => $topics,'username'=>$username
        ));
    }

	    public function searchAction()
    {
	/*
    if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
        throw new AccessDeniedException('Vous ne pouvez pas accéder à cette partie du site sans être connecté');
    }
	*/
	    $em = $this->getDoctrine()->getEntityManager();
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
		$request = $this->get('request')->request->all();
        $results = null;
		$query = $request['q'];
            $page = $this->get('request')->query->get('page', 1);
            $results = $em->getRepository('LibertribesForumBundle:Post')->search($query, true);
            $results->setCurrentPage($page);
            $results->setMaxPerPage($this->container->getParameter('libertribes_forum.paginator.search_results_per_page'));
        
        return $this->render('LibertribesForumBundle:Forum:search.html.twig', array(
            'results'   => $results,'username'=>$username
        ));
    }
}
