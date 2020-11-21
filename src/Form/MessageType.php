<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('object', TextType::class, [
			'label' => 'L\'objet :',
                'attr' => [
					'required' => true,
					'autofocus' => true,
                    'placeholder' => 'Entrez l\'objet de ce message',
                ],
			])
            ->add('email', EmailType::class, [
			'label' => 'Votre adresse email :',
                'attr' => [
					'required' => true,
                    'placeholder' => 'Entrez votre adresse email',
                ],
			])
            ->add('content', TextareaType::class, [
			'label' => 'Contenu de ce message :',
                'attr' => [
					'required' => true,
                    'placeholder' => 'Entrez le contenu de ce message',
                ],
			])
            ->add('accept', CheckboxType::class, [
    'label'    => 'Je confirme l\'envoi d ce message et j\'accepte de partager mes données personnelles.',
    'required' => false,
]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
