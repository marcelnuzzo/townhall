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
                'label' => false,
                'attr' => [
                    'autofocus' => true,
                    'required' => true,
                    'placeholder' => 'Titre de l\'aticle',
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
            ->add('summary', TextareaType::class, [
                'label' => false,
                'attr' => [
				'required' => false,
                    'placeholder' => 'Résumé de l\'aticle',
                ],
            ])
            ->add('content', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Contenu de l\'article',
                ]
            ])
            ->add('image')
            ->add('user', EntityType::class, [
            'label' => 'Sélectionnez un utilisateur',
            'class' => User::class,
            'choice_label' => 'email',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
