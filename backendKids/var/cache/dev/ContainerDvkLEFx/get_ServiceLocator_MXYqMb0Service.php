<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MXYqMb0Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.MXYqMb0' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.MXYqMb0'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'chapterRepository' => ['privates', 'App\\Repository\\ChapterRepository', 'getChapterRepositoryService', true],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
        ], [
            'chapterRepository' => 'App\\Repository\\ChapterRepository',
            'entityManager' => '?',
        ]);
    }
}
