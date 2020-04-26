<?php

namespace App\Form;

use App\Entity\Beekeeper;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom du miel",
                'attr' => [
                    'placeholder' => 'Entrer le nom du miel'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description du produit"
            ])
            ->add('price', TextType::class, [
                'label' => "Prix (format : 00.00)",
                'attr' => [
                    'placeholder' => 'Indisuez le prix du miel'
                ]
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => 'Ajouter une image'
            ])
            ->add('beekeeper', EntityType::class, [
                'class' => Beekeeper::class,
                'choice_label' => 'name',
                'label' => "Nom de l'appiculteur"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
