<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'autofocus' => true,
                    'required' => true,
                    'placeholder' => 'Entrez le titre',
                ],
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Sélectionnez une catégorie',
                'expanded' => true,
                'choices' => [
                    'Événement' => 'event',
                    'Alerte info' => 'alert-info',
                    'Annonce' => 'annonce',
                ],
            ])
            ->add('summar', TextareaType::class, [
<<<<<<< HEAD
                'label' => 'Résumé de l\'article :',
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Entrez le résumé de l\'aticle',
=======
                'label' => 'Résumé',
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Entrez le résumé',
>>>>>>> 6b32708d623df0d06bd32f8e9f07d2bc1676bf70
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
            ])
            ->add('imageName', TextType::class, [
                'label' => 'Nom de la photo',
                'attr' => [
                    'autofocus' => true,
                    'required' => true,
                    'placeholder' => 'Entrez le nom de la photo',
                ],
            ])
<<<<<<< HEAD
            /*
            ->add('imageName', TextType::class, [
                'label' => 'Nom de la photo :',
                'attr' => [
                    'autofocus' => true,
                    'required' => true,
                    'placeholder' => 'Entrez le nom de la photo',
                ],
            ])
            */
            ->add('imageFile', VichImageType::class, array(
                'required' => false,
                'label' => "Photo de l'article",
                'allow_delete' => false,
            ));
=======
            ->add('imageFile', VichImageType::class, array(
                'required' => false,
                'label' => "Photo de l'article",
                'allow_delete' => true,
            ))
            ->add('user', EntityType::class, [
                'label' => 'Sélectionnez un utilisateur',
                'class' => User::class,
                'choice_label' => 'email',
            ]);
>>>>>>> 6b32708d623df0d06bd32f8e9f07d2bc1676bf70
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}