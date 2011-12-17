<?php

namespace Libertribes\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libertribes\GameBundle\Entity\Avatar
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\GameBundle\Entity\AvatarRepository")
 */
class Avatar
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
     * @var string $avatar_name
     *
     * @ORM\Column(name="avatar_name", type="string", length=20)
     */
    private $avatar_name;

    /**
     * @var integer $avatar_age
     *
     * @ORM\Column(name="avatar_age", type="integer")
     */
    private $avatar_age;

    /**
     * @var string $avatar_race
     *
     * @ORM\Column(name="avatar_race", type="string", length=20)
     */
    private $avatar_race;

    /**
     * @var integer $account_id
     *
     * @ORM\Column(name="account_id", type="integer")
     */
    private $account_id;

    /**
     * @var integer $avatar_world
     *
     * @ORM\Column(name="avatar_world", type="integer")
     */
    private $avatar_world;

    /**
     * @var string $politic_regime
     *
     * @ORM\Column(name="politic_regime", type="string", length=20)
     */
    private $politic_regime;

    /**
     * @var string $player_filiation_type
     *
     * @ORM\Column(name="player_filiation_type", type="string", length=20)
     */
    private $player_filiation_type;

    /**
     * @var string $player_filiation_hypot
     *
     * @ORM\Column(name="player_filiation_hypot", type="string", length=20)
     */
    private $player_filiation_hypot;

    /**
     * @var integer $player_filiation_cert
     *
     * @ORM\Column(name="player_filiation_cert", type="integer")
     */
    private $player_filiation_cert;

    /**
     * @var integer $level_aggressivity
     *
     * @ORM\Column(name="level_aggressivity", type="integer")
     */
    private $level_aggressivity;

    /**
     * @var integer $level_fraud
     *
     * @ORM\Column(name="level_fraud", type="integer")
     */
    private $level_fraud;

    /**
     * @var integer $level_commerce
     *
     * @ORM\Column(name="level_commerce", type="integer")
     */
    private $level_commerce;

    /**
     * @var integer $level_efficiency
     *
     * @ORM\Column(name="level_efficiency", type="integer")
     */
    private $level_efficiency;

    /**
     * @var integer $avatar_life
     *
     * @ORM\Column(name="avatar_life", type="integer")
     */
    private $avatar_life;

    /**
     * @var date $last_connexion
     *
     * @ORM\Column(name="last_connexion", type="date")
     */
    private $last_connexion;


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
     * Set avatar_name
     *
     * @param string $avatarName
     */
    public function setAvatarName($avatarName)
    {
        $this->avatar_name = $avatarName;
    }

    /**
     * Get avatar_name
     *
     * @return string 
     */
    public function getAvatarName()
    {
        return $this->avatar_name;
    }

    /**
     * Set avatar_age
     *
     * @param integer $avatarAge
     */
    public function setAvatarAge($avatarAge)
    {
        $this->avatar_age = $avatarAge;
    }

    /**
     * Get avatar_age
     *
     * @return integer 
     */
    public function getAvatarAge()
    {
        return $this->avatar_age;
    }

    /**
     * Set avatar_race
     *
     * @param string $avatarRace
     */
    public function setAvatarRace($avatarRace)
    {
        $this->avatar_race = $avatarRace;
    }

    /**
     * Get avatar_race
     *
     * @return string 
     */
    public function getAvatarRace()
    {
        return $this->avatar_race;
    }

    /**
     * Set account_id
     *
     * @param integer $accountId
     */
    public function setAccountId($accountId)
    {
        $this->account_id = $accountId;
    }

    /**
     * Get account_id
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Set avatar_world
     *
     * @param integer $avatarWorld
     */
    public function setAvatarWorld($avatarWorld)
    {
        $this->avatar_world = $avatarWorld;
    }

    /**
     * Get avatar_world
     *
     * @return integer 
     */
    public function getAvatarWorld()
    {
        return $this->avatar_world;
    }

    /**
     * Set politic_regime
     *
     * @param string $politicRegime
     */
    public function setPoliticRegime($politicRegime)
    {
        $this->politic_regime = $politicRegime;
    }

    /**
     * Get politic_regime
     *
     * @return string 
     */
    public function getPoliticRegime()
    {
        return $this->politic_regime;
    }

    /**
     * Set player_filiation_type
     *
     * @param string $playerFiliationType
     */
    public function setPlayerFiliationType($playerFiliationType)
    {
        $this->player_filiation_type = $playerFiliationType;
    }

    /**
     * Get player_filiation_type
     *
     * @return string 
     */
    public function getPlayerFiliationType()
    {
        return $this->player_filiation_type;
    }

    /**
     * Set player_filiation_hypot
     *
     * @param string $playerFiliationHypot
     */
    public function setPlayerFiliationHypot($playerFiliationHypot)
    {
        $this->player_filiation_hypot = $playerFiliationHypot;
    }

    /**
     * Get player_filiation_hypot
     *
     * @return string 
     */
    public function getPlayerFiliationHypot()
    {
        return $this->player_filiation_hypot;
    }

    /**
     * Set player_filiation_cert
     *
     * @param integer $playerFiliationCert
     */
    public function setPlayerFiliationCert($playerFiliationCert)
    {
        $this->player_filiation_cert = $playerFiliationCert;
    }

    /**
     * Get player_filiation_cert
     *
     * @return integer 
     */
    public function getPlayerFiliationCert()
    {
        return $this->player_filiation_cert;
    }

    /**
     * Set level_aggressivity
     *
     * @param integer $levelAggressivity
     */
    public function setLevelAggressivity($levelAggressivity)
    {
        $this->level_aggressivity = $levelAggressivity;
    }

    /**
     * Get level_aggressivity
     *
     * @return integer 
     */
    public function getLevelAggressivity()
    {
        return $this->level_aggressivity;
    }

    /**
     * Set level_fraud
     *
     * @param integer $levelFraud
     */
    public function setLevelFraud($levelFraud)
    {
        $this->level_fraud = $levelFraud;
    }

    /**
     * Get level_fraud
     *
     * @return integer 
     */
    public function getLevelFraud()
    {
        return $this->level_fraud;
    }

    /**
     * Set level_commerce
     *
     * @param integer $levelCommerce
     */
    public function setLevelCommerce($levelCommerce)
    {
        $this->level_commerce = $levelCommerce;
    }

    /**
     * Get level_commerce
     *
     * @return integer 
     */
    public function getLevelCommerce()
    {
        return $this->level_commerce;
    }

    /**
     * Set level_efficiency
     *
     * @param integer $levelEfficiency
     */
    public function setLevelEfficiency($levelEfficiency)
    {
        $this->level_efficiency = $levelEfficiency;
    }

    /**
     * Get level_efficiency
     *
     * @return integer 
     */
    public function getLevelEfficiency()
    {
        return $this->level_efficiency;
    }

    /**
     * Set avatar_life
     *
     * @param integer $avatarLife
     */
    public function setAvatarLife($avatarLife)
    {
        $this->avatar_life = $avatarLife;
    }

    /**
     * Get avatar_life
     *
     * @return integer 
     */
    public function getAvatarLife()
    {
        return $this->avatar_life;
    }

    /**
     * Set last_connexion
     *
     * @param date $lastConnexion
     */
    public function setLastConnexion($lastConnexion)
    {
        $this->last_connexion = $lastConnexion;
    }

    /**
     * Get last_connexion
     *
     * @return date 
     */
    public function getLastConnexion()
    {
        return $this->last_connexion;
    }
}