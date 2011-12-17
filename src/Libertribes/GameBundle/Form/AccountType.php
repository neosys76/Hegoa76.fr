<?php

namespace Libertribes\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nickname')
            ->add('firstname')
            ->add('password')
            ->add('email')
            ->add('confirmation')
            ->add('status')
        ;
    }

    public function getName()
    {
        return 'libertribes_gamebundle_accounttype';
    }
}
