<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Challenge;
use App\Entity\Chapter;
use App\Entity\Coach;
use App\Entity\Kid;
use App\Entity\Lesson;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('kid', EntityType::class, [
                'class' => Kid::class,
                'choice_label' => 'id',
            ])
            ->add('coach', EntityType::class, [
                'class' => Coach::class,
                'choice_label' => 'id',
            ])
            ->add('challenge', EntityType::class, [
                'class' => Challenge::class,
                'choice_label' => 'id',
            ])
            ->add('chapter', EntityType::class, [
                'class' => Chapter::class,
                'choice_label' => 'id',
            ])
            ->add('lesson', EntityType::class, [
                'class' => Lesson::class,
                'choice_label' => 'id',
            ])
            ->add('post', EntityType::class, [
                'class' => Post::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
