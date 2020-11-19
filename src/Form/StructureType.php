<?php

namespace App\Form;

use App\Entity\Structure;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('organization_type')
            ->add('school_type')
            ->add('name')
            ->add('logo')
            ->add('summary')
            ->add('content')
            ->add('postaladdress')
            ->add('phone')
            ->add('email')
            ->add('website')
			->add('user', EntityType::class, [
    'class' => User::class,
    'choice_label' => 'email',
	]);
			;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
