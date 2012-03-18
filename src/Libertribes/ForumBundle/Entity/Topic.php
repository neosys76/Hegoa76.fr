<?php

namespace Libertribes\ForumBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Libertribes\Component\Inflector;
use Gedmo\Sluggable\Util\Urlizer;
use DateTime;

/**
 * Libertribes\ForumBundle\Entity\Topic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\ForumBundle\Entity\TopicRepository")
 */
class Topic
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * @Assert\MinLength(limit=4, message="Just a little too short.")
	 *
     * @var string $subject
     *
     * @ORM\Column(name="subject", type="string", length=50)
     */
    protected $subject;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=100)
     */
    protected $slug;

    /**
     * @var integer $numViews
     *
     * @ORM\Column(name="num_views", type="integer")
     */
    protected $numViews;

    /**
     * @var integer $numPosts
     *
     * @ORM\Column(name="num_posts", type="integer")
     */
    protected $numPosts;

    /**
     * @var boolean $isClosed
     *
     * @ORM\Column(name="is_closed", type="boolean")
     */
    protected $isClosed;

    /**
     * @var boolean $isPinned
     *
     * @ORM\Column(name="is_pinned", type="boolean")
     */
    protected $isPinned;

    /**
     * @var boolean $isBurried
     *
     * @ORM\Column(name="is_buried", type="boolean")
     */
    protected $isBuried;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var datetime $pulledAt
     *
     * @ORM\Column(name="pulled_at", type="datetime")
     */
    protected $pulledAt;

    /**
     * @var integer $categoryid
     *
     * @ORM\Column(name="category", type="integer")
     */
    private $categoryid;

    /**
     * @param Category $category
     * @Assert\NotBlank
     * @Assert\Valid
     */
    protected $category;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=50)
     */
    protected $author;

    /**
     * @param Post $firstPost
     */
    protected $firstPost;

    /**
     * @param Post $lastPost
     */
    protected $lastPost;

    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->numViews = $this->numPosts = 0;
        $this->isClosed = $this->isPinned = $this->isBuried = false;
    }
	
	
    /**
     * Return the name of this topic creator
     *
     * @return string
     **/
    public function getAuthor()
	{
		return $this->author;
	}

    /**
     * Set the name of this topic's creator
     *
     * @param string
     **/
    public function setAuthor($author)
	{
		$this->author=$author;
	}
	
    /**
     * Gets the id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the subject
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        $this->setSlug(Urlizer::urlize($this->getSubject()));
    }

    /**
     * Gets the subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Retrieves the slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Sets the number of views
     *
     * @param string $numViews
     */
    public function setNumViews($numViews)
    {
        $this->numViews = \intval($numViews);
    }

    /**
     * Gets the number of views
     *
     * @return integer
     */
    public function getNumViews()
    {
        return $this->numViews;
    }

    /**
     * Increments the number of views
     */
    public function incrementNumViews()
    {
        $this->numViews++;
    }

    /**
     * Decrement the number of views
     */
    public function decrementNumViews()
    {
        $this->numViews--;
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
     * Gets the number of posts
     *
     * @return integer
     */
    public function getNumPosts()
    {
        return $this->numPosts;
    }

    /**
     * Get the number of replies
     *
     * @return integer
     **/
    public function getNumReplies()
    {
        return $this->getNumPosts() - 1;
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
     * Defines whether the topic is closed or not
     *
     * @param boolean $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = (bool) $isClosed;
    }

    /**
     * Indicates whether the topic is closed or not
     *
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * Defines whether the topic is pinned or not
     *
     * @param boolean $isPinned
     */
    public function setIsPinned($isPinned)
    {
        $this->isPinned = (bool) $isPinned;
    }

    /**
     * Indicates whether the topic is pinned or not
     *
     * @return booelan
     */
    public function getIsPinned()
    {
        return $this->isPinned;
    }

    /**
     * Defines whether the topoc is burried or not
     *
     * @param boolean $isBuried
     */
    public function setIsBuried($isBuried)
    {
        $this->isBuried = (bool) $isBuried;
    }

    /**
     * Indicates whether the topoc is burried or not
     *
     * @return <type>
     */
    public function getIsBuried()
    {
        return $this->isBuried;
    }

    /**
     * Gets the creation timestamp
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Updates the pull timestamp to the latest post creation date
     */
    public function setPulledAt(DateTime $datetime)
    {
        $this->pulledAt = $datetime;
    }

    /**
     * Gets the pull timestamp
     *
     * @return DateTime
     */
    public function getPulledAt()
    {
        return $this->pulledAt;
    }

    /**
     * Gets the first post
     *
     * @return Post
     */
    public function getFirstPost()
    {
        return $this->firstPost;
    }

    /**
     * Sets the first post
     *
     * @param Post
     * @return null
     */
    public function setFirstPost(Post $post)
    {
        $post->setTopic($this);
        $this->firstPost = $post;
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
     * @param Post
     * @return null
     */
    public function setLastPost(Post $post)
    {
        $this->lastPost = $post;
    }

    /**
     * Sets the category
     *
     * @param Category $category
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;
    }

    /**
     * Gets the category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    public function __toString()
    {
        return (string) $this->getSubject();
    }

}
