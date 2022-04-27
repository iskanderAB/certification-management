<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
                    'مدير منطقة الشمال الشرقي' => "مدير منطقة الشمال الشرقي",
                    'رئيس قسم الادارة و التصرف' => "رئيس قسم الادارة و التصرف",
                ]
            ])
            ->add('firstname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'الاسم . . .',
                    'required' => true
                    ]
            ])
            ->add('lastname',TextType::class,[
                'attr'  =>[
                    'placeholder'   => 'اللقب . . .',
                    'required' => true
                    ]
            ])
            ->add('gender', ChoiceType::class, [
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
            ->add('signer',TextType::class,[
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
