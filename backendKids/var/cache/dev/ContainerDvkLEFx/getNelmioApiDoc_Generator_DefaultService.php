<?php

namespace ContainerDvkLEFx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioApiDoc_Generator_DefaultService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'nelmio_api_doc.generator.default' shared service.
     *
     * @return \Nelmio\ApiDocBundle\ApiDocGenerator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'ApiDocGenerator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zircote'.\DIRECTORY_SEPARATOR.'swagger-php'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Generator.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'zircote'.\DIRECTORY_SEPARATOR.'swagger-php'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Processors'.\DIRECTORY_SEPARATOR.'ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Processor'.\DIRECTORY_SEPARATOR.'NullablePropertyProcessor.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Processor'.\DIRECTORY_SEPARATOR.'MapQueryStringProcessor.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'nelmio'.\DIRECTORY_SEPARATOR.'api-doc-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Processor'.\DIRECTORY_SEPARATOR.'MapRequestPayloadProcessor.php';

        $a = new \OpenApi\Generator();
        $a->addProcessor(new \Nelmio\ApiDocBundle\Processor\NullablePropertyProcessor(), NULL);
        $a->addProcessor(new \Nelmio\ApiDocBundle\Processor\MapQueryStringProcessor(), NULL);
        $a->addProcessor(new \Nelmio\ApiDocBundle\Processor\MapRequestPayloadProcessor(), NULL);

        $container->services['nelmio_api_doc.generator.default'] = $instance = new \Nelmio\ApiDocBundle\ApiDocGenerator(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['nelmio_api_doc.describers.config'] ?? $container->load('getNelmioApiDoc_Describers_ConfigService'));
            yield 1 => ($container->privates['nelmio_api_doc.describers.config.default'] ??= new \Nelmio\ApiDocBundle\Describer\ExternalDocDescriber([], true));
            yield 2 => ($container->privates['nelmio_api_doc.describers.openapi_php.default'] ?? $container->load('getNelmioApiDoc_Describers_OpenapiPhp_DefaultService'));
            yield 3 => ($container->privates['nelmio_api_doc.describers.route.default'] ?? $container->load('getNelmioApiDoc_Describers_Route_DefaultService'));
            yield 4 => ($container->privates['nelmio_api_doc.describers.default'] ??= new \Nelmio\ApiDocBundle\Describer\DefaultDescriber());
        }, 5), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['nelmio_api_doc.model_describers.self_describing'] ??= new \Nelmio\ApiDocBundle\ModelDescriber\SelfDescribingModelDescriber());
            yield 1 => ($container->privates['nelmio_api_doc.model_describers.enum'] ??= new \Nelmio\ApiDocBundle\ModelDescriber\EnumModelDescriber());
            yield 2 => ($container->privates['nelmio_api_doc.model_describers.form'] ?? $container->load('getNelmioApiDoc_ModelDescribers_FormService'));
            yield 3 => ($container->privates['nelmio_api_doc.model_describers.object'] ?? $container->load('getNelmioApiDoc_ModelDescribers_ObjectService'));
        }, 4), NULL, 'openapi_doc.default', $a);

        $b = new \Monolog\Logger('nelmio_api_doc');
        $b->pushHandler(($container->privates['monolog.handler.console'] ?? self::getMonolog_Handler_ConsoleService($container)));
        $b->pushHandler(($container->privates['monolog.handler.main'] ?? self::getMonolog_Handler_MainService($container)));
        ($container->privates['debug.debug_logger_configurator'] ?? self::getDebug_DebugLoggerConfiguratorService($container))->pushDebugLogger($b);

        $instance->setAlternativeNames([]);
        $instance->setMediaTypes(['json']);
        $instance->setLogger($b);
        $instance->setOpenApiVersion(NULL);

        return $instance;
    }
}
