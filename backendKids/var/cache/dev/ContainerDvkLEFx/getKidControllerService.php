<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKidControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\KidController' shared autowired service.
     *
     * @return \App\Controller\KidController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'KidController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Service'.\DIRECTORY_SEPARATOR.'KidService.php';

        $container->services['App\\Controller\\KidController'] = $instance = new \App\Controller\KidController(($container->privates['security.user_password_hasher'] ?? $container->load('getSecurity_UserPasswordHasherService')), new \App\Service\KidService());

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\KidController', $container));

        return $instance;
    }
}
