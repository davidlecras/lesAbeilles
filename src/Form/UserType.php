<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                TextType::class,
                [
                    'label' => 'Votre nom d\'utilisateur',
                    'attr' => [
                        'placeholder' => 'Indiquez votre nom d\'utilisateur'
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Votre e-mail',
                    'attr' => [
                        'placeholder' => 'Indiquez votre adresse e-mail'
                    ]
                ]
            )
            ->add(
                'password',
                PasswordType::class,
                [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Indiquez le même mot de passe'
                    ]
                ]
            )
            ->add(
                'verifPassword',
                PasswordType::class,
                [
                    'label' => 'Confirmation mot de passe',
                    'attr' => [
                        'placeholder' => 'Indiquez le même mot de passe'
                    ]
                ]
            )
            ->add('HasAcceptedThermsAndConditions', CheckboxType::class,
             [
                    'label' => 'J\'accepte les conditions d\'utilisation'
                ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
