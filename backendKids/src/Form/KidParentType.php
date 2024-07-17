<?php

namespace App\Form;

use App\Entity\Kid;
use App\Entity\KidParent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KidParentType extends AbstractType
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
            ->add('kid', EntityType::class, [
                'class' => Kid::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => KidParent::class,
        ]);
    }
}
