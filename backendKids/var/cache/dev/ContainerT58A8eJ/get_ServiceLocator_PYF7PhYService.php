<?php

namespace ContainerT58A8eJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PYF7PhYService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.PYF7PhY' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.PYF7PhY'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'post' => ['privates', '.errored..service_locator.PYF7PhY.App\\Entity\\Post', NULL, 'Cannot autowire service ".service_locator.PYF7PhY": it needs an instance of "App\\Entity\\Post" but this type has been excluded in "config/services.yaml".'],
        ], [
            'post' => 'App\\Entity\\Post',
        ]);
    }
}
