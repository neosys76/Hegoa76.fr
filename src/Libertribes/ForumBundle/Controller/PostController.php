<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\ForumBundle\Entity\Post;
use Libertribes\ForumBundle\Entity\Topic;
use Libertribes\ForumBundle\Entity\Category;

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
    public function indexAction($topicid)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
        $thetopic = $em->getRepository('LibertribesForumBundle:Topic')->findOneById($topicid);
		$subject = $thetopic->getSubject();
		$thecategory = $em->getRepository('LibertribesForumBundle:Category')->findOneById($thetopic->getCategoryid());
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
		$thetopic->incrementNumViews();
		$em->persist($thetopic);
		$em->flush();
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => $subject, 'username'=>$username, 'topicid'=>$topicid, 'categoryname'=>$thecategory->getName(),
			'author'=>$thetopic->getAuthor()
        ));
    }


    /**
     * Send one Post 
     *
     */
    public function newpostAction()
    {
		$request = $this->get('request')->request->all();
		$username = $request['author'];
		$topicid = $request['topicid'];
		$message = $request['message'];
        $em = $this->getDoctrine()->getEntityManager();
		$lastpost = $em->getRepository('LibertribesForumBundle:Post')->findRecentByTopic($topicid, 1);
        $newpost = $em->getRepository('LibertribesForumBundle:Post')->createNewPost();
		$newnumber = $lastpost[0]->getNumber()+1;
		$newpost->setNumber($newnumber);
		$newpost->setMessage($message);
		$newpost->setTopicId($topicid);
		$newpost->setAuthor($username);
		$em->persist($newpost);
		$em->flush();
		$topic = $em->getRepository('LibertribesForumBundle:Topic')->findOneById($topicid);
		$topic->setNumPosts($newnumber);
		$em->persist($topic);
		$em->flush();
		$categoryid=$topic->getCategoryid();
		$thecategory = $em->getRepository('LibertribesForumBundle:Category')->findOneById($categoryid);
		$thecategory->incrementNumPosts();
		$em->persist($thecategory);
		$em->flush();
        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => $topic->getSubject(), 'username'=>$username, 'topicid'=>$topicid, 'categoryname'=>$thecategory->getName(),
			'author'=>$topic->getAuthor()
        ));
    }
}