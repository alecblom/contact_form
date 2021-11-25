<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('companyName', TextType::class, [
                'required' => false,
            ])
            ->add('phone', TextType::class, [
                'required' => false,
            ])
            ->add('email', TextType::class, [
                'required' => false,
            ])
            ->add('messageType', ChoiceType::class, [
                'choices' => [
                    'vraag' => 'vraag',
                    'opmerking' => 'opmerking',
                    'klacht' => 'klacht'
                ]
            ])
            ->add('message', TextType::class)
            ->add('subscribedToNewsletter', CheckboxType::class, [
                'required' => false,
                'attr' => array('checked'   => 'checked'),
            ])
            ->add('save', SubmitType::class, ['label' => 'Send Message']);
    }
}
