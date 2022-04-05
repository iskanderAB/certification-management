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
                'label' => 'Matricule',
                'attr'  =>
                [
                    'placeholder'   => 'Matricule . . .',
                    'list'          => 'references-list',
                    'autocomplete'  => 'off',
                    'required' => true
                ]
            ])
            ->add('chef', ChoiceType::class, [
                'choices' => [
                    'le Chef du Département de la Zona Nord Est' => "le Chef du Département de la Zona Nord Est",
                    'le chef du division administrative et gestion' => "le chef du division administrative et gestion",
                ]
            ])
            ->add('firstname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Nom . . .',
                    'required' => true
                    ]
            ])
            ->add('lastname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'prénom . . .',
                    'required' => true
                    ]
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Homme' => "H",
                    'Famme' => "F",
                ]
            ])
            ->add('poste', ChoiceType::class, [
                'choices' => [
                    'inspecteur' => "INSPECTEUR",
                    'another job' => "JOB",
                ]
            ])
            ->add('signer',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Signataire . . .',
                    'required' => true
                    ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'TITULAIRE' => "TITULAIRE",
                    'STAGIER' => "STAGIER",
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
