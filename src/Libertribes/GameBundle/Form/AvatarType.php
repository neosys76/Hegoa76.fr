<?php

namespace Libertribes\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AvatarType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('avatar_name')
            ->add('avatar_age')
            ->add('avatar_race')
            ->add('account_id')
            ->add('avatar_world')
            ->add('politic_regime')
            ->add('player_filiation_type')
            ->add('player_filiation_hypot')
            ->add('player_filiation_cert')
            ->add('level_aggressivity')
            ->add('level_fraud')
            ->add('level_commerce')
            ->add('level_efficiency')
            ->add('avatar_life')
            ->add('last_connexion')
        ;
    }

    public function getName()
    {
        return 'libertribes_gamebundle_avatartype';
    }
}
