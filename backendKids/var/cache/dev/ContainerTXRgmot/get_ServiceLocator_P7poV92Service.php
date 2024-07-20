<?php

namespace ContainerTXRgmot;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_P7poV92Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.P7poV92' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.P7poV92'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kidRepository' => ['privates', 'App\\Repository\\KidRepository', 'getKidRepositoryService', true],
        ], [
            'kidRepository' => 'App\\Repository\\KidRepository',
        ]);
    }
}
