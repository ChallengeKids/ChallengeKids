<?php

namespace ContainerTXRgmot;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_Controller_RedoclyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'nelmio_api_doc.controller.redocly' shared service.
     *
     * @return \Nelmio\ApiDocBundle\Controller\SwaggerUiController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'SwaggerUiController.php';

        return $container->services['nelmio_api_doc.controller.redocly'] = new \Nelmio\ApiDocBundle\Controller\SwaggerUiController(($container->services['nelmio_api_doc.render_docs'] ?? $container->load('getNelmioApiDoc_RenderDocsService')), 'redocly');
    }
}
