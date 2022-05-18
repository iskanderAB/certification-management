<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertifArType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('reference', TextType::class, [
                'label' => 'الرقم الالي ',
                'attr'  =>
                [
                    'placeholder'   => '  الرقم الالي. . .',
                    'list'          => 'references-list',
                    'autocomplete'  => 'off',
                    'required' => true
                ]
            ])
            ->add('chef', ChoiceType::class, [
                'choices' => [
                    'مديرية منطقة الشمال الشرقي' => "مديرية منطقة الشمال الشرقي",
                    'قسم الادارة و التصرف' =>  "قسم الادارة و التصرف",
                ]
            ])
            ->add('Nom',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'الاسم . . .',
                    'required' => true
                    ]
            ])
            ->add('Prenom',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'اللقب . . .',
                    'required' => true
                    ]
            ])
            ->add('Genre', ChoiceType::class, [
                'choices' => [
                    'ذكر' => "H",
                    'انثي' => "F",
                ]
            ])
            ->add('poste', TextType::class, [
                'attr'  =>[
                'placeholder'   => 'الخطة . . .',
                'required' => true
                ]]
            )
            ->add('Signature',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'الموقع  . . .',
                    'required' => true
                    ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'مترسم' => "مترسم",
                    'متربص' => "متربص",
                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->add('print', SubmitType::class, ['label' => 'Save and Add'])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
