<?php

namespace Libertribes\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Libertribes\ForumBundle\Entity\Category;
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
		$request = $this->get('request')->request->all();
		$username = $request['author'];
		$categoryid = $request['categoryid'];
		$subject = $request['subject'];
		$message = $request['message'];
        $em = $this->getDoctrine()->getEntityManager();
		$topic = $em->getRepository('LibertribesForumBundle:Topic')->createNewTopic();
		$topic->setAuthor($username);
		$topic->setSubject($subject);
		$slugtopic = $topic->getSlug();
		$topic->setNumPosts(1);
		$topic->setCategoryid($categoryid);
		$em->persist($topic);
		$em->flush();
        $topic = $em->getRepository('LibertribesForumBundle:Topic')->findOneByCategoryAndSlug($categoryid, $slugtopic);
        if (!$topic) {
            throw new NotFoundHttpException(sprintf('Le Sujet correspondant à la catégorie n° "%s" et au slug "%s" non trouvé', $categoryid, $slugtopic));
        }
		$topicid = $topic->getId();
		$post = $em->getRepository('LibertribesForumBundle:Post')->createNewPost();
		$post->setCreatedAt($topic->getCreatedAt());
		$post->setAuthor($username);
		$post->setMessage($message);
		$post->setNumber(1);
		$post->setTopicId($topicid);
		$post->setTopic($topic);
		$em->persist($post);
		$em->flush();
		$thecategory = $em->getRepository('LibertribesForumBundle:Category')->findOneById($categoryid);
		$thecategory->incrementNumTopics();
		$thecategory->incrementNumPosts();
		$em->persist($thecategory);
		$em->flush();
        $posts = $em->getRepository('LibertribesForumBundle:Post')->findAllByTopic($topicid,true);
        return $this->redirect($this->generateUrl('forum_post_list',array('topicid'=>$topicid)));
	} 
	
	public function findByIdAction($topicid){
        $em = $this->getDoctrine()->getEntityManager();
		$topic = $em->getRepository('LibertribesForumBundle:Topic')->findOneById($topicid);
        return $this->render('LibertribesForumBundle:Topic:findbyid.html.twig', array(
            'topic' => $topic
        ));
	}
}
