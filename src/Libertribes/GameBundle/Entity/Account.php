<?php

namespace Libertribes\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libertribes\GameBundle\Entity\Account
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\GameBundle\Entity\AccountRepository")
 */
class Account
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
     * @var string $nickname
     *
     * @ORM\Column(name="nickname", type="string", length=30)
     */
    private $nickname;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=30)
     */
    private $firstname;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=32)
     */
    private $password;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var boolean $confirmation
     *
     * @ORM\Column(name="confirmation", type="boolean")
     */
    private $confirmation;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=20)
     */
    private $status;


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
     * Set nickname
     *
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set confirmation
     *
     * @param boolean $confirmation
     */
    public function setConfirmation($confirmation)
    {
        $this->confirmation = $confirmation;
    }

    /**
     * Get confirmation
     *
     * @return boolean 
     */
    public function getConfirmation()
    {
        return $this->confirmation;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}