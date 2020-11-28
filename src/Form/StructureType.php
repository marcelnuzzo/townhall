<?php

namespace App\Form;

use App\Entity\Structure;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
<<<<<<< HEAD
        $structure = $options['structure'];
		
		
		$builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'infrastructure :',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Entrez le nom de l\'infrastructure',
                ],
            ]);
			
			if ($structure == "établissements scolaire") {
			$builder
			->add('school_type', ChoiceType::class, [
                'label' => 'Sélectionnez le type d\'établissement scolaire :',
                'expanded' => true,
                'choices' => [
                    'École maternelle' => 'École maternelle',
                    'École primaire' => 'École primaire',
                    'Collège' => 'Collège',
					'Lycée' => 'Lycée',
                ],
            ]);
			}
			
           $builder
			->add('logo')
            ->add('summary', TextareaType::class, [
                'label' => 'Quelques mots sur l\'infrastructure :',
                'attr' => [
                    'placeholder' => 'Quelques mots sur l\'infrastructure',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Descripf!ion :',
                'attr' => [
                    'placeholder' => 'Indiqur une description',
                ],
            ])
            ->add('postaladdress', TextType::class, [
                'label' => 'Adrese postale de l\'infrastructure :',
                'attr' => [
                    'placeholder' => 'Entrez l\'adresse postale de l\'infrastructure',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'N° téléphone de l\'infrastructure :',
                'attr' => [
                    'placeholder' => 'Entrez le numéro de téléphone de l\'infrastructure',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email de l\'infrastructure :',
                'attr' => [
                    'placeholder' => 'Entrez l\adrsse email de l\'infrastructure',
                ],
            ])
            ->add('website', UrlType::class, [
                'label' => 'Adresse URL de l\'infrastructure :',
                'attr' => [
                    'placeholder' => 'Entrez l\'adresse URL de l\'infrastructure',
                ],
            ])
			->add('user', EntityType::class, [
					'label' => 'Sélectionnez un utilisateur :',
    'class' => User::class,
    'choice_label' => 'email',
	]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
			'structure' => null,
        ]);
    }
}
