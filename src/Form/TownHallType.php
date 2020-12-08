<?php

namespace App\Form;

use App\Entity\TownHall;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TownHallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de la ville",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Nom de la ville',
                ],
            ])
            /*
            ->add('logoName', TextType::class, [
                'label' => "Nom du logo",
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Nom du logo',
                ],
            ])
            */
            ->add('logoFile', VichImageType::class, array(
                'required' => false,
                'label' => "Photo du logo",
                'allow_delete' => false, 
            ))
            ->add('story', TextareaType::class, [
                'label' => "Histoire",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Histoire de la ville',
                ],
            ])
            ->add('summar', TextareaType::class, [
                'label' => "Résumé",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Résumé de son histoire',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => "Contenu",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Contenu historique',
                ],
            ])
            ->add('postaladdress', TextType::class, [
                'label' => "Adresse postale",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Adresse postale',
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => "N° de téléphone",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Numéro de téléphone',
                ],
            ])
            ->add('email', TextType::class, [
                'label' => "Adresse mail",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Adresse mail',
                ],
            ])
            ->add('website', TextType::class, [
                'label' => "Site web",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Nom du site web',
                ],
            ])
            ->add('latitude', TextType::class, [
                'label' => "Latitude",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Latitude',
                ],
            ])
            ->add('longitude', TextType::class, [
                'label' => "Longitude",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Longitude',
                ],
            ])
            ->add('nameMayor', TextType::class, [
                'label' => "Nom du maire",
                'attr' => [
                    'required' => true,
                    'placeholder' => 'Nom du maire',
                ],
            ])
            /*
            ->add('imageName', TextType::class, [
                'label' => "Nom de l'image",
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Nom de l\'image',
                ],
            ])
            */
            ->add('imageFile', VichImageType::class, array(
                'required' => false,
                'label' => "Photo du maire",
                'allow_delete' => false, 
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TownHall::class,
        ]);
    }
}
