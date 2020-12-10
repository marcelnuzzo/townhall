<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $withoutPw = $options['withoutPw'];
        $builder
		->add('lastname', TextType::class, [
			'label' => 'Nom',
			'attr' => [
				'required' => true,
				'placeholder' => 'Nom',
			],
		])
        ->add('firstname', TextType::class, [
            'label' => 'Prénom',
            'attr' => [
                'required' => true,
                'placeholder' => 'Prénom',
            ],
        ])
        ->add('phone', TelType::class, [
            'label' => 'Numéro de téléphone',
            'attr' => [
                'required' => false,
                'placeholder' => 'Numéro de téléphone',
            ],
        ])
        ->add('email', TextType::class, [
            'label' => 'Email',
            'attr' => [
                'required' => true,
                'placeholder' => 'Email',
            ],
        ])
        ->add("roles", CollectionType::class, [
            'entry_type' => ChoiceType::class, 
            'entry_options' => [
                'label' => false,
                'choices' => [
                    'ROLE_ADMIN' => "ROLE_ADMIN",
                    'ROLE_USER' => "ROLE_USER"
                ],
                'expanded' => true,
                'multiple' => false,
            ]
        ]);
        if($withoutPw) {
            $builder
            ->add("password", TextType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Mot de passe',
                ]
            ])
             ;
        }
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'withoutPw' => null,
        ]);
    }
}
