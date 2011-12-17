<?php

namespace Libertribes\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TownType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('coordinates_slotId')
            ->add('size')
            ->add('defense_bonusmalus')
            ->add('food_bonusmalus')
            ->add('iron_bonus')
            ->add('wood_bonus')
            ->add('cyniam_bonus')
            ->add('avatar_id')
            ->add('building_productionWood')
            ->add('building_stockWood')
            ->add('building_productionIron')
            ->add('building_stockIron')
            ->add('building_productionCyniam')
            ->add('building_stockCyniam')
            ->add('building_productionFood')
            ->add('building_stockFood')
            ->add('building_wizardryTrainingAttack')
            ->add('building_wizardryTrainingDefense')
            ->add('building_armyTrainingHand2hand')
            ->add('building_armyTrainingDistancefighting')
            ->add('building_armyTrainingDefense')
            ->add('building_troopCamp')
            ->add('slotId_building_troopCamp')
            ->add('building_productionMotorizedUnit')
            ->add('building_wizardSchool')
            ->add('building_manaHarvesting')
            ->add('building_science')
            ->add('building_wall')
            ->add('building_turret')
            ->add('building_ambassy')
        ;
    }

    public function getName()
    {
        return 'libertribes_gamebundle_towntype';
    }
}
