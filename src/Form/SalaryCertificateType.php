<?php

namespace App\Form;

use App\Entity\SalaryCertificate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalaryCertificateType extends AbstractType
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
                    'placeholder'   => 'Signature . . .',
                    'required' => true
                    ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'TITULAIRE' => "TITULAIRE",
                    'STAGIAIRE' => "STAGIAIRE",
                ]
            ])
            ->add('P1')
            ->add('p2')
            ->add('p3')
            ->add('p4')
            ->add('p5')
            ->add('p6')
            ->add('p7')
            ->add('p8')
            ->add('p9')
            ->add('p10')
            ->add('p11')
            ->add('p12')
            ->add('p13')
            ->add('p14')
            ->add('p15')
            ->add('p16')
            ->add('p17')
            ->add('p18')
            ->add('p19')
            ->add('p20')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => SalaryCertificate::class,
        ]);
    }
}
