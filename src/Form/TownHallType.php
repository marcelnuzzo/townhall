<?php

namespace App\Form;

use App\Entity\TownHall;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TownHallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('logo')
            ->add('story')
            ->add('summary')
            ->add('content')
            ->add('postaladdress')
            ->add('phone')
            ->add('email')
            ->add('website')
            ->add('latitude')
            ->add('longitude')
            ->add('nameMayor')
            ->add('photoMayor')
            ->add('townHallTeam')
            ->add('imageName')
            ->add('updateAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TownHall::class,
        ]);
    }
}
