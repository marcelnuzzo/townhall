<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de l\'article :',
                'attr' => [
                    'autofocus' => true,
                    'required' => true,
                    'placeholder' => 'Entrez le titre de l\'aticle',
                ],
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Sélectionnez une catégorie :',
                'expanded' => true,
                'choices' => [
                    'Événement' => 'event',
                    'Alerte info' => 'alert-info',
                    'Annonce' => 'annonce',
                ],
            ])
            ->add('summar', TextareaType::class, [
                'label' => 'Résumé de l\'article :',
                'attr' => [
				'required' => false,
                    'placeholder' => 'Entrez le résumé de l\'aticle',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu de l\'article :',
            ])
            ->add('image');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
