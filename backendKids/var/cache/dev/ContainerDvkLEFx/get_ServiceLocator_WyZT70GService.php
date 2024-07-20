<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WyZT70GService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.WyZT70G' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.WyZT70G'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'kidParentRepository' => ['privates', 'App\\Repository\\KidParentRepository', 'getKidParentRepositoryService', true],
        ], [
            'kidParentRepository' => 'App\\Repository\\KidParentRepository',
        ]);
    }
}
