<?php

namespace App\Form;

use App\Entity\Kid;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('secondName')
            ->add('email')
            ->add('password')
            ->add('registrationDate', null, [
                'widget' => 'single_text',
            ])
            ->add('birthDate', null, [
                'widget' => 'single_text',
            ])
            ->add('friends')
            ->add('points')
            ->add('level')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kid::class,
        ]);
    }
}
