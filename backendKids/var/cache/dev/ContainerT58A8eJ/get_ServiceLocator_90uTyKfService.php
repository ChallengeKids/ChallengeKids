<?php

namespace ContainerT58A8eJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_90uTyKfService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.90uTyKf' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.90uTyKf'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'quiz' => ['privates', '.errored..service_locator.90uTyKf.App\\Entity\\Quiz', NULL, 'Cannot autowire service ".service_locator.90uTyKf": it needs an instance of "App\\Entity\\Quiz" but this type has been excluded in "config/services.yaml".'],
        ], [
            'quiz' => 'App\\Entity\\Quiz',
        ]);
    }
}
