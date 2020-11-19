<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('organization_type', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type d\'organisation',
                ]
            ])
            ->add('school_type', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Type d\'établissement scolaire',
                ]
            ])
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Nom',
                ]
            ])
            ->add('logo')
            ->add('summary', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Résumé',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Contenu',
                ],
            ])
            ->add('postaladdress', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Adresse',
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Numéro de téléphone',
                ],
            ])
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Email',
                ],
            ])
            ->add('website', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Site internet',
                ],
            ])
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
