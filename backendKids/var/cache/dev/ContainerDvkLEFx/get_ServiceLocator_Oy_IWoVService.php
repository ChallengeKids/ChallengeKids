<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Oy_IWoVService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.oy.IWoV' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.oy.IWoV'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'lessonRepository' => ['privates', 'App\\Repository\\LessonRepository', 'getLessonRepositoryService', true],
        ], [
            'lessonRepository' => 'App\\Repository\\LessonRepository',
        ]);
    }
}
