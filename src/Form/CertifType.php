<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                    'le chef de division administrative et gestion' => "le chef de division administrative et gestion",
                ]
            ])
            ->add('Nom',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Nom . . .',
                    'required' => true
                    ]
            ])
            ->add('Prenom',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'prénom . . .',
                    'required' => true
                    ]
            ])
            ->add('Genre', ChoiceType::class, [
                'choices' => [
                    'Homme' => "H",
                    'Femme' => "F",
                ]
            ])
            ->add('poste', TextType::class, [
                'attr'  =>[
                'placeholder'   => 'Poste . . .',
                'required' => true
                ]]
            )
            ->add('Signature',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'Signataire . . .',
                    'required' => true
                    ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'TITULAIRE' => "TITULAIRE",
                    'STAGIAIRE' => "STAGIAIRE",
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->add('print', SubmitType::class, ['label' => 'Save and Add']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
