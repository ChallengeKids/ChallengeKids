<?php

namespace ContainerTXRgmot;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LzBT_V1Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.LzBT.v1' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.LzBT.v1'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'lesson' => ['privates', '.errored..service_locator.LzBT.v1.App\\Entity\\Lesson', NULL, 'Cannot autowire service ".service_locator.LzBT.v1": it needs an instance of "App\\Entity\\Lesson" but this type has been excluded in "config/services.yaml".'],
            'user' => ['privates', '.errored..service_locator.LzBT.v1.App\\Entity\\User', NULL, 'Cannot autowire service ".service_locator.LzBT.v1": it needs an instance of "App\\Entity\\User" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'lesson' => 'App\\Entity\\Lesson',
            'user' => 'App\\Entity\\User',
        ]);
    }
}
