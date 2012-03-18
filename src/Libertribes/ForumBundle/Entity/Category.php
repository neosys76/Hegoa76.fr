<?php

namespace Libertribes\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Libertribes\Component\Inflector;

/**
 * Libertribes\ForumBundle\Entity\Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\ForumBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=100)
     */
    private $slug;

    /**
     * @var integer $position
     *
     * @ORM\Column(name="position", type="integer")
     */	 
    private $position;

    private $numTopics;
    private $numPosts;
    private $lastTopic;
    private $lastPost;

    public function __construct()
    {
        $this->position = 0;
        $this->numTopics = 0;
        $this->numPosts = 0;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }
	

    /**
     * Sets the slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = Inflector::slugify($slug);
    }

    /**
     * Gets the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Generates the slug whether it is empty
     */
    public function generateSlug()
    {
        if (empty($this->slug)) {
            $this->setSlug($this->getName());
        }
    }

    /**
     * Sets the position
     *
     * @param integer $position
     */
    public function setPosition($position)
    {
        $this->position = \intval($position);
    }

    /**
     * Gets the position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the number of topics
     *
     * @param integer $numTopics
     */
    public function setNumTopics($numTopics)
    {
        $this->numTopics = \intval($numTopics);
    }

    /**
     * Gets the number of topics
     *
     * @return integer
     */
    public function getNumTopics()
    {
        return $this->numTopics;
    }

    /**
     * Increments the number of topics
     */
    public function incrementNumTopics()
    {
        $this->numTopics++;
    }

    /**
     * Decrements the number of topics
     */
    public function decrementNumTopics()
    {
        $this->numTopics--;
    }

    /**
     * Gets the number of posts
     *
     * @return integer
     */
    public function getNumPosts()
    {
        return $this->numPosts;
    }

    /**
     * Sets the number of posts
     *
     * @param integer $numPosts
     */
    public function setNumPosts($numPosts)
    {
        $this->numPosts = \intval($numPosts);
    }

    /**
     * Increments the number of posts
     */
    public function incrementNumPosts()
    {
        $this->numPosts++;
    }

    /**
     * Decrements the number of posts
     */
    public function decrementNumPosts()
    {
        $this->numPosts--;
    }

    /**
     * Sets the last topic
     *
     * @param Topic $topic
     */
    public function setLastTopic(Topic $topic)
    {
        $this->lastTopic = $topic;
    }

    /**
     * Gets the last topic
     *
     * @return Topic
     */
    public function getLastTopic()
    {
        return $this->lastTopic;
    }

    /**
     * Gets the last post
     *
     * @return Post
     */
    public function getLastPost()
    {
        return $this->lastPost;
    }

    /**
     * Sets the last post
     *
     * @param Post $post
     */
    public function setLastPost(Post $post)
    {
        $this->lastPost = $post;
    }

    public function __toString()
    {
        return $this->name;
    }
}