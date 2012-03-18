<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\ForumBundle\Entity\Topic;
use Libertribes\ForumBundle\Entity\Post;

/**
 * Topic controller.
 *
 */
class TopicController extends Controller
{
    /**
     * Lists all Topic entities.
     *
     */
    public function indexAction($categoryid,$categoryname)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $topics = $em->getRepository('LibertribesForumBundle:Topic')->findAllByCategory($categoryid,true);
		$username = $this->get('security.context')->getToken()->getUsername();
		if(!isset($username)){$username="";}
        return $this->render('LibertribesForumBundle:Topic:index.html.twig', array(
            'topics' => $topics, 'categoryid' => $categoryid, 'categoryname' => $categoryname, 'username'=>$username
        ));
    }
    public function listallAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $topics = $em->getRepository('LibertribesForumBundle:Topic')->findAll();

        return $this->render('LibertribesForumBundle:Topic:index.html.twig', array(
            'topics' => $topics, 'categoryname' => 'all'
        ));
    }
	public function createnewtopicAction(){
        $em = $this->getDoctrine()->getEntityManager();
		$topic = $em->getRepository('LibertribesForumBundle:Topic')->createNewTopic();
		$post = $em->getRepository('LibertribesForumBundle:Post')->createNewPost();
		$request = $this->get('request')->request->all();
		$username = $request['author'];
		$categoryid = $request['categoryid'];
		$subject = $request['subject'];
		$message = $request['message'];
		$topic->setAuthor($username);
		$topic->setSubject($subject);
		$slugtopic = $topic->getSlug();
		$topic->setNumPosts(1);
		$em->persist($topic);
		$em->flush();
        $topic = $this->get('LibertribesForumBundle:Topic')->findOneByCategoryAndSlug($categoryid, $slugtopic);
        if (!$topic) {
            throw new NotFoundHttpException(sprintf('Le Sujet correspondant à la catégorie n° "%s" et au slug "%s" non trouvé', $categoryid, $slugtopic));
        }
		$topicid = $topic->getId();
		$post->setAuthor($username);
		$post->setMessage($message);
		$post->setNumber(1);
		$post->setTopicId($topicid);
		$em->persist($post);
		$em->flush();
        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
        return $this->render('LibertribesForumBundle:Post:index.html.twig', array(
            'posts' => $posts, 'subject' => $subject, 'username'=>$username
        ));
	}
}
