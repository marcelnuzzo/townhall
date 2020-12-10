<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $structure = strtolower($options['structure']);
		$builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Entrez le nom',
                ],
            ]);
			
			if ($structure == "etablissement scolaire") {
			$builder
			->add('school_type', ChoiceType::class, [
                'label' => 'Sélectionnez le type d\'établissement scolaire',
                'expanded' => true,
                'choices' => [
                    'Ecole maternelle' => 'Ecole maternelle',
                    'Ecole primaire' => 'Ecole primaire',
                    'Collège' => 'Collège',
					'Lycée' => 'Lycée',
                ],
            ]);
			}
			
           $builder
            ->add('summar', TextareaType::class, [
                'label' => 'Quelques mots sur l\'infrastructure',
                'attr' => [
                    'placeholder' => 'Quelques mots sur l\'infrastructure',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Indiqur une description',
                ],
            ])
            ->add('postaladdress', TextType::class, [
                'label' => 'Adresse postale',
                'attr' => [
                    'placeholder' => 'Entrez l\'adresse postale',
                ],
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'placeholder' => 'Entrez le numéro de téléphone',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => [
                    'placeholder' => 'Entrez l\adrsse email',
                ],
            ])
            ->add('website', UrlType::class, [
                'label' => 'Adresse URL',
                'attr' => [
                    'placeholder' => 'Entrez l\'adresse URL',
                ],
            ])
            /*
			->add('user', EntityType::class, [
                'label' => 'Sélectionnez un utilisateur',
                'class' => User::class,
                'choice_label' => 'email',
            ])
            ->add('logoFile', VichImageType::class, array(
			'label' => 'Importez un logo',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Logo de la structure',
                ],
                'allow_delete' => false,
                'download_uri' => false
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
			'structure' => null,
        ]);
    }
}