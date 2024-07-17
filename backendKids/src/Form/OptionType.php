<?php

namespace App\Form;

use App\Entity\KidResponse;
use App\Entity\Option;
use App\Entity\Question;
use App\Entity\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type')
            ->add('question', EntityType::class, [
                'class' => Question::class,
                'choice_label' => 'id',
            ])
            ->add('response', EntityType::class, [
                'class' => KidResponse::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Option::class,
        ]);
    }
}
