<?php

namespace Libertribes\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libertribes\GameBundle\Entity\Town
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Libertribes\GameBundle\Entity\TownRepository")
 */
class Town
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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var integer $coordinates_slotId
     *
     * @ORM\Column(name="coordinates_slotId", type="integer")
     */
    private $coordinates_slotId;

    /**
     * @var integer $size
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var integer $defense_bonusmalus
     *
     * @ORM\Column(name="defense_bonusmalus", type="integer")
     */
    private $defense_bonusmalus;

    /**
     * @var integer $food_bonusmalus
     *
     * @ORM\Column(name="food_bonusmalus", type="integer")
     */
    private $food_bonusmalus;

    /**
     * @var integer $iron_bonus
     *
     * @ORM\Column(name="iron_bonus", type="integer")
     */
    private $iron_bonus;

    /**
     * @var integer $wood_bonus
     *
     * @ORM\Column(name="wood_bonus", type="integer")
     */
    private $wood_bonus;

    /**
     * @var integer $cyniam_bonus
     *
     * @ORM\Column(name="cyniam_bonus", type="integer")
     */
    private $cyniam_bonus;

    /**
     * @var integer $avatar_id
     *
     * @ORM\Column(name="avatar_id", type="integer")
     */
    private $avatar_id;

    /**
     * @var integer $building_productionWood
     *
     * @ORM\Column(name="building_productionWood", type="integer")
     */
    private $building_productionWood;

    /**
     * @var integer $building_stockWood
     *
     * @ORM\Column(name="building_stockWood", type="integer")
     */
    private $building_stockWood;

    /**
     * @var integer $building_productionIron
     *
     * @ORM\Column(name="building_productionIron", type="integer")
     */
    private $building_productionIron;

    /**
     * @var integer $building_stockIron
     *
     * @ORM\Column(name="building_stockIron", type="integer")
     */
    private $building_stockIron;

    /**
     * @var integer $building_productionCyniam
     *
     * @ORM\Column(name="building_productionCyniam", type="integer")
     */
    private $building_productionCyniam;

    /**
     * @var integer $building_stockCyniam
     *
     * @ORM\Column(name="building_stockCyniam", type="integer")
     */
    private $building_stockCyniam;

    /**
     * @var integer $building_productionFood
     *
     * @ORM\Column(name="building_productionFood", type="integer")
     */
    private $building_productionFood;

    /**
     * @var integer $building_stockFood
     *
     * @ORM\Column(name="building_stockFood", type="integer")
     */
    private $building_stockFood;

    /**
     * @var integer $building_wizardryTrainingAttack
     *
     * @ORM\Column(name="building_wizardryTrainingAttack", type="integer")
     */
    private $building_wizardryTrainingAttack;

    /**
     * @var integer $building_wizardryTrainingDefense
     *
     * @ORM\Column(name="building_wizardryTrainingDefense", type="integer")
     */
    private $building_wizardryTrainingDefense;

    /**
     * @var integer $building_armyTrainingHand2hand
     *
     * @ORM\Column(name="building_armyTrainingHand2hand", type="integer")
     */
    private $building_armyTrainingHand2hand;

    /**
     * @var integer $building_armyTrainingDistancefighting
     *
     * @ORM\Column(name="building_armyTrainingDistancefighting", type="integer")
     */
    private $building_armyTrainingDistancefighting;

    /**
     * @var integer $building_armyTrainingDefense
     *
     * @ORM\Column(name="building_armyTrainingDefense", type="integer")
     */
    private $building_armyTrainingDefense;

    /**
     * @var integer $building_troopCamp
     *
     * @ORM\Column(name="building_troopCamp", type="integer")
     */
    private $building_troopCamp;

    /**
     * @var integer $slotId_building_troopCamp
     *
     * @ORM\Column(name="slotId_building_troopCamp", type="integer")
     */
    private $slotId_building_troopCamp;

    /**
     * @var integer $building_productionMotorizedUnit
     *
     * @ORM\Column(name="building_productionMotorizedUnit", type="integer")
     */
    private $building_productionMotorizedUnit;

    /**
     * @var integer $building_wizardSchool
     *
     * @ORM\Column(name="building_wizardSchool", type="integer")
     */
    private $building_wizardSchool;

    /**
     * @var integer $building_manaHarvesting
     *
     * @ORM\Column(name="building_manaHarvesting", type="integer")
     */
    private $building_manaHarvesting;

    /**
     * @var integer $building_science
     *
     * @ORM\Column(name="building_science", type="integer")
     */
    private $building_science;

    /**
     * @var integer $building_wall
     *
     * @ORM\Column(name="building_wall", type="integer")
     */
    private $building_wall;

    /**
     * @var integer $building_turret
     *
     * @ORM\Column(name="building_turret", type="integer")
     */
    private $building_turret;

    /**
     * @var integer $building_ambassy
     *
     * @ORM\Column(name="building_ambassy", type="integer")
     */
    private $building_ambassy;


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
     * Set coordinates_slotId
     *
     * @param integer $coordinatesSlotId
     */
    public function setcoordinatesSlotId($coordinatesSlotId)
    {
        $this->coordinates_slotId = $coordinatesSlotId;
    }

    /**
     * Get coordinates_slotId
     *
     * @return integer 
     */
    public function getcoordinatesSlotId()
    {
        return $this->coordinates_slotId;
    }

    /**
     * Set size
     *
     * @param integer $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set defense_bonusmalus
     *
     * @param integer $defenseBonusmalus
     */
    public function setDefenseBonusmalus($defenseBonusmalus)
    {
        $this->defense_bonusmalus = $defenseBonusmalus;
    }

    /**
     * Get defense_bonusmalus
     *
     * @return integer 
     */
    public function getDefenseBonusmalus()
    {
        return $this->defense_bonusmalus;
    }

    /**
     * Set food_bonusmalus
     *
     * @param integer $foodBonusmalus
     */
    public function setFoodBonusmalus($foodBonusmalus)
    {
        $this->food_bonusmalus = $foodBonusmalus;
    }

    /**
     * Get food_bonusmalus
     *
     * @return integer 
     */
    public function getFoodBonusmalus()
    {
        return $this->food_bonusmalus;
    }

    /**
     * Set iron_bonus
     *
     * @param integer $ironBonus
     */
    public function setIronBonus($ironBonus)
    {
        $this->iron_bonus = $ironBonus;
    }

    /**
     * Get iron_bonus
     *
     * @return integer 
     */
    public function getIronBonus()
    {
        return $this->iron_bonus;
    }

    /**
     * Set wood_bonus
     *
     * @param integer $woodBonus
     */
    public function setWoodBonus($woodBonus)
    {
        $this->wood_bonus = $woodBonus;
    }

    /**
     * Get wood_bonus
     *
     * @return integer 
     */
    public function getWoodBonus()
    {
        return $this->wood_bonus;
    }

    /**
     * Set cyniam_bonus
     *
     * @param integer $cyniamBonus
     */
    public function setCyniamBonus($cyniamBonus)
    {
        $this->cyniam_bonus = $cyniamBonus;
    }

    /**
     * Get cyniam_bonus
     *
     * @return integer 
     */
    public function getCyniamBonus()
    {
        return $this->cyniam_bonus;
    }

    /**
     * Set avatar_id
     *
     * @param integer $avatarId
     */
    public function setAvatarId($avatarId)
    {
        $this->avatar_id = $avatarId;
    }

    /**
     * Get avatar_id
     *
     * @return integer 
     */
    public function getAvatarId()
    {
        return $this->avatar_id;
    }

    /**
     * Set building_productionWood
     *
     * @param integer $buildingProductionWood
     */
    public function setBuildingProductionWood($buildingProductionWood)
    {
        $this->building_productionWood = $buildingProductionWood;
    }

    /**
     * Get building_productionWood
     *
     * @return integer 
     */
    public function getBuildingProductionWood()
    {
        return $this->building_productionWood;
    }

    /**
     * Set building_stockWood
     *
     * @param integer $buildingStockWood
     */
    public function setBuildingStockWood($buildingStockWood)
    {
        $this->building_stockWood = $buildingStockWood;
    }

    /**
     * Get building_stockWood
     *
     * @return integer 
     */
    public function getBuildingStockWood()
    {
        return $this->building_stockWood;
    }

    /**
     * Set building_productionIron
     *
     * @param integer $buildingProductionIron
     */
    public function setBuildingProductionIron($buildingProductionIron)
    {
        $this->building_productionIron = $buildingProductionIron;
    }

    /**
     * Get building_productionIron
     *
     * @return integer 
     */
    public function getBuildingProductionIron()
    {
        return $this->building_productionIron;
    }

    /**
     * Set building_stockIron
     *
     * @param integer $buildingStockIron
     */
    public function setBuildingStockIron($buildingStockIron)
    {
        $this->building_stockIron = $buildingStockIron;
    }

    /**
     * Get building_stockIron
     *
     * @return integer 
     */
    public function getBuildingStockIron()
    {
        return $this->building_stockIron;
    }

    /**
     * Set building_productionCyniam
     *
     * @param integer $buildingProductionCyniam
     */
    public function setBuildingProductionCyniam($buildingProductionCyniam)
    {
        $this->building_productionCyniam = $buildingProductionCyniam;
    }

    /**
     * Get building_productionCyniam
     *
     * @return integer 
     */
    public function getBuildingProductionCyniam()
    {
        return $this->building_productionCyniam;
    }

    /**
     * Set building_stockCyniam
     *
     * @param integer $buildingStockCyniam
     */
    public function setBuildingStockCyniam($buildingStockCyniam)
    {
        $this->building_stockCyniam = $buildingStockCyniam;
    }

    /**
     * Get building_stockCyniam
     *
     * @return integer 
     */
    public function getBuildingStockCyniam()
    {
        return $this->building_stockCyniam;
    }

    /**
     * Set building_productionFood
     *
     * @param integer $buildingProductionFood
     */
    public function setBuildingProductionFood($buildingProductionFood)
    {
        $this->building_productionFood = $buildingProductionFood;
    }

    /**
     * Get building_productionFood
     *
     * @return integer 
     */
    public function getBuildingProductionFood()
    {
        return $this->building_productionFood;
    }

    /**
     * Set building_stockFood
     *
     * @param integer $buildingStockFood
     */
    public function setBuildingStockFood($buildingStockFood)
    {
        $this->building_stockFood = $buildingStockFood;
    }

    /**
     * Get building_stockFood
     *
     * @return integer 
     */
    public function getBuildingStockFood()
    {
        return $this->building_stockFood;
    }

    /**
     * Set building_wizardryTrainingAttack
     *
     * @param integer $buildingWizardryTrainingAttack
     */
    public function setBuildingWizardryTrainingAttack($buildingWizardryTrainingAttack)
    {
        $this->building_wizardryTrainingAttack = $buildingWizardryTrainingAttack;
    }

    /**
     * Get building_wizardryTrainingAttack
     *
     * @return integer 
     */
    public function getBuildingWizardryTrainingAttack()
    {
        return $this->building_wizardryTrainingAttack;
    }

    /**
     * Set building_wizardryTrainingDefense
     *
     * @param integer $buildingWizardryTrainingDefense
     */
    public function setBuildingWizardryTrainingDefense($buildingWizardryTrainingDefense)
    {
        $this->building_wizardryTrainingDefense = $buildingWizardryTrainingDefense;
    }

    /**
     * Get building_wizardryTrainingDefense
     *
     * @return integer 
     */
    public function getBuildingWizardryTrainingDefense()
    {
        return $this->building_wizardryTrainingDefense;
    }

    /**
     * Set building_armyTrainingHand2hand
     *
     * @param integer $buildingArmyTrainingHand2hand
     */
    public function setBuildingArmyTrainingHand2hand($buildingArmyTrainingHand2hand)
    {
        $this->building_armyTrainingHand2hand = $buildingArmyTrainingHand2hand;
    }

    /**
     * Get building_armyTrainingHand2hand
     *
     * @return integer 
     */
    public function getBuildingArmyTrainingHand2hand()
    {
        return $this->building_armyTrainingHand2hand;
    }

    /**
     * Set building_armyTrainingDistancefighting
     *
     * @param integer $buildingArmyTrainingDistancefighting
     */
    public function setBuildingArmyTrainingDistancefighting($buildingArmyTrainingDistancefighting)
    {
        $this->building_armyTrainingDistancefighting = $buildingArmyTrainingDistancefighting;
    }

    /**
     * Get building_armyTrainingDistancefighting
     *
     * @return integer 
     */
    public function getBuildingArmyTrainingDistancefighting()
    {
        return $this->building_armyTrainingDistancefighting;
    }

    /**
     * Set building_armyTrainingDefense
     *
     * @param integer $buildingArmyTrainingDefense
     */
    public function setBuildingArmyTrainingDefense($buildingArmyTrainingDefense)
    {
        $this->building_armyTrainingDefense = $buildingArmyTrainingDefense;
    }

    /**
     * Get building_armyTrainingDefense
     *
     * @return integer 
     */
    public function getBuildingArmyTrainingDefense()
    {
        return $this->building_armyTrainingDefense;
    }

    /**
     * Set building_troopCamp
     *
     * @param integer $buildingTroopCamp
     */
    public function setBuildingTroopCamp($buildingTroopCamp)
    {
        $this->building_troopCamp = $buildingTroopCamp;
    }

    /**
     * Get building_troopCamp
     *
     * @return integer 
     */
    public function getBuildingTroopCamp()
    {
        return $this->building_troopCamp;
    }

    /**
     * Set slotId_building_troopCamp
     *
     * @param integer $slotIdBuildingTroopCamp
     */
    public function setSlotIdBuildingTroopCamp($slotIdBuildingTroopCamp)
    {
        $this->slotId_building_troopCamp = $slotIdBuildingTroopCamp;
    }

    /**
     * Get slotId_building_troopCamp
     *
     * @return integer 
     */
    public function getSlotIdBuildingTroopCamp()
    {
        return $this->slotId_building_troopCamp;
    }

    /**
     * Set building_productionMotorizedUnit
     *
     * @param integer $buildingProductionMotorizedUnit
     */
    public function setBuildingProductionMotorizedUnit($buildingProductionMotorizedUnit)
    {
        $this->building_productionMotorizedUnit = $buildingProductionMotorizedUnit;
    }

    /**
     * Get building_productionMotorizedUnit
     *
     * @return integer 
     */
    public function getBuildingProductionMotorizedUnit()
    {
        return $this->building_productionMotorizedUnit;
    }

    /**
     * Set building_wizardSchool
     *
     * @param integer $buildingWizardSchool
     */
    public function setBuildingWizardSchool($buildingWizardSchool)
    {
        $this->building_wizardSchool = $buildingWizardSchool;
    }

    /**
     * Get building_wizardSchool
     *
     * @return integer 
     */
    public function getBuildingWizardSchool()
    {
        return $this->building_wizardSchool;
    }

    /**
     * Set building_manaHarvesting
     *
     * @param integer $buildingManaHarvesting
     */
    public function setBuildingManaHarvesting($buildingManaHarvesting)
    {
        $this->building_manaHarvesting = $buildingManaHarvesting;
    }

    /**
     * Get building_manaHarvesting
     *
     * @return integer 
     */
    public function getBuildingManaHarvesting()
    {
        return $this->building_manaHarvesting;
    }

    /**
     * Set building_science
     *
     * @param integer $buildingScience
     */
    public function setBuildingScience($buildingScience)
    {
        $this->building_science = $buildingScience;
    }

    /**
     * Get building_science
     *
     * @return integer 
     */
    public function getBuildingScience()
    {
        return $this->building_science;
    }

    /**
     * Set building_wall
     *
     * @param integer $buildingWall
     */
    public function setBuildingWall($buildingWall)
    {
        $this->building_wall = $buildingWall;
    }

    /**
     * Get building_wall
     *
     * @return integer 
     */
    public function getBuildingWall()
    {
        return $this->building_wall;
    }

    /**
     * Set building_turret
     *
     * @param integer $buildingTurret
     */
    public function setBuildingTurret($buildingTurret)
    {
        $this->building_turret = $buildingTurret;
    }

    /**
     * Get building_turret
     *
     * @return integer 
     */
    public function getBuildingTurret()
    {
        return $this->building_turret;
    }

    /**
     * Set building_ambassy
     *
     * @param integer $buildingAmbassy
     */
    public function setBuildingAmbassy($buildingAmbassy)
    {
        $this->building_ambassy = $buildingAmbassy;
    }

    /**
     * Get building_ambassy
     *
     * @return integer 
     */
    public function getBuildingAmbassy()
    {
        return $this->building_ambassy;
    }
}