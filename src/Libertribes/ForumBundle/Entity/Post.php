<?php

namespace Libertribes\ForumBundle\Entity;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Libertribes\ForumBundle\Entity\Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\ForumBundle\Entity\PostRepository")
 */
class Post
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
     * @var integer $topicid
     *
     * @ORM\Column(name="topic", type="integer")
     */
    protected $topicid;

    /**
     * Topic the post belongs to
     *
     * @var Topic
     */
    protected $topic;

    /**
     * @Assert\NotBlank(message="Please write a message")
     * @Assert\MinLength(limit=4, message="Just a little too short.")
     *
     * @var text $message
     *
     * @ORM\Column(name="subject", type="text")
     */
    protected $message;

    /**
     * Post number relative to its topic
     *
     * @var integer number
	 *
     * @ORM\Column(name="number", type="integer")
     */
    protected $number = null;

    /**
     * @var boolean $createdAt
     *
     * @ORM\Column(name="created_at", type="boolean")
     */
    protected $createdAt;

    /**
     * @var boolean $updatedAt
     *
     * @ORM\Column(name="updated_at", type="boolean")
     */
    protected $updatedAt;

    /**
     * @var string $author
     *
     * @ORM\Column(name="author", type="string", length=50)
     */
    protected $author;

    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
    }

    /**
     * Return the name of this post author
     *
     * @return string
     **/
    public function getAuthor()
	{
		return $this->author;
	}

    /**
     * Set the name of this post's author
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
     * Sets the message
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Gets the message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get number
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     * @param  int
     * @return null
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
     * Sets the creation date
     *
     * @return null
     **/
    public function setCreatedAt(DateTime $date)
    {
        $this->createdAt = $date;
    }

    public function isPosteriorTo(Post $post = null)
    {
        if (!$post) {
            return true;
        }

        return $this->getCreatedAt()->getTimestamp() > $post->getCreatedAt()->getTimestamp();
    }

    /**
     * Gets the update timestamp
     *
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Gets the topic
     *
     * @return Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Sets the topic
     *
     * @return null
     **/
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }
	
    /**
     * Gets the topicId
     *
     * @return int 
     */
    public function getTopicId()
    {
        return $this->topicid;
    }

    /**
     * Sets the topicId
     *
     * @return null
     **/
    public function setTopicId($topicid)
    {
        $this->topicid = $topicid;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }

}
