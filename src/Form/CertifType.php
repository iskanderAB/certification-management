<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference', TextType::class, [
                'label' => 'Reference',
                'attr'  =>
                [
                    'placeholder'   => 'reference . . .',
                    'list'          => 'references-list',
                    'autocomplete'  => 'off',
                    'required' => true
                ]
            ])
            ->add('chef', ChoiceType::class, [
                'choices' => [
                    'chefNord' => "chefNord",
                    'chefWest' => "chefWest",
                ]
            ])
            ->add('firstname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Firstname . . .',
                    'required' => true
                    ]
            ])
            ->add('lastname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Lastname . . .',
                    'required' => true
                    ]
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => "M",
                    'Female' => "F",
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'stagier' => "stagier",
                    'employée' => "employée",
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
