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
        $builder
		->add('lastname', TextType::class, [
			'label' => 'Nom :',
			'attr' => [
				'required' => true,
				'placeholder' => 'Entrez le nom',
			],
		])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
                'attr' => [
					'required' => true,
                    'placeholder' => 'Entrez le prénom',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'N° téléphone :',
                'attr' => [
                    'required' => false,
					'placeholder' => 'Entrez le numéro de téléphone',
                ],
            ])
			->add('email', TextType::class, [
                'label' => 'Adresse email :',
                'attr' => [
					'required' => true,
                    'placeholder' => 'Entrez l\'adress,e email',
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
            ])
            /*
            ->add('roles', ChoiceType::class, [
                "choices" => [
                    'ROLE_ADMIN' => "ROLE_ADMIN",
                    'ROLE_USER' => "ROLE_USER"
                ],
                'mapped' => true,
                'expanded' => true,
                'multiple' => false,
            ])
            */
            ;
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
