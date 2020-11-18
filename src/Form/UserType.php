<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ->add('phone', TextType::class, [
                'label' => 'N° téléphone :',
                'attr' => [
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
            ->add('password');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
