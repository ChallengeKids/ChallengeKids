<?php

namespace ContainerTXRgmot;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_59sDmZoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.59sDmZo' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.59sDmZo'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'quiz' => ['privates', '.errored..service_locator.59sDmZo.App\\Entity\\Quiz', NULL, 'Cannot autowire service ".service_locator.59sDmZo": it needs an instance of "App\\Entity\\Quiz" but this type has been excluded in "config/services.yaml".'],
        ], [
            'entityManager' => '?',
            'quiz' => 'App\\Entity\\Quiz',
        ]);
    }
}
