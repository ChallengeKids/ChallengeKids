<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZTmq4HkService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.zTmq4Hk' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.zTmq4Hk'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'questionRepository' => ['privates', 'App\\Repository\\QuestionRepository', 'getQuestionRepositoryService', true],
            'quiz' => ['privates', '.errored..service_locator.zTmq4Hk.App\\Entity\\Quiz', NULL, 'Cannot autowire service ".service_locator.zTmq4Hk": it needs an instance of "App\\Entity\\Quiz" but this type has been excluded in "config/services.yaml".'],
        ], [
            'questionRepository' => 'App\\Repository\\QuestionRepository',
            'quiz' => 'App\\Entity\\Quiz',
        ]);
    }
}
