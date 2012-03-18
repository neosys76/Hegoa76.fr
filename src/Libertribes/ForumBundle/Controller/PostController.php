<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\ForumBundle\Entity\Post;
use Libertribes\ForumBundle\Entity\Topic;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    /**
     * Lists all Post entities for one Topic
     *
     */
    public function indexAction($topicid, $subject)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => $subject, 'username'=>$username
        ));
    }

    /**
     * Lists all Post entities
     *
     */
    public function listallAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAll();
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => "all", 'username'=>$username
        ));
    }
    /**
     * Send one Post 
     *
     */
    public function newpostAction($topicid)
    {
        $em = $this->getDoctrine()->getEntityManager();
		$lastpost = $em->getRepository('LibertribesForumBundle:Post')->findRecentByTopic($topicid, 1);
        $newpost = $em->getRepository('LibertribesForumBundle:Post')->createNewPost();
		$request = $this->get('request')->request->all();
		$username = $request['author'];
		$topicid = $request['topicid'];
		$message = $request['message'];
		$newnumber = $lastpost->getNumber()+1;
		$newpost->setNumber($newnumber);
		$newpost->setMessage($message);
		$newpost->setTopicId($topicid);
		$newpost->setAuthor($username);
		$em->persist($post);
		$em->flush();
		$topic = $em->getRepository('LibertribesForumBundle:Topic')->findOneById($topicid);
		$topic->setNumPosts($newnumber);
		$em->persist($topic);
		$em->flush();
        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => $topic->getSubject(), 'username'=>$username
        ));
    }
}