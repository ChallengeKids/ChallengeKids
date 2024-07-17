<?php

namespace ContainerT58A8eJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getStimulus_AssetMapper_LoaderJavascriptCompilerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'stimulus.asset_mapper.loader_javascript_compiler' shared service.
     *
     * @return \Symfony\UX\StimulusBundle\AssetMapper\StimulusLoaderJavaScriptCompiler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'asset-mapper'.\DIRECTORY_SEPARATOR.'Compiler'.\DIRECTORY_SEPARATOR.'AssetCompilerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'stimulus-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'AssetMapper'.\DIRECTORY_SEPARATOR.'StimulusLoaderJavaScriptCompiler.php';

        $a = ($container->privates['stimulus.asset_mapper.controllers_map_generator'] ?? $container->load('getStimulus_AssetMapper_ControllersMapGeneratorService'));

        if (isset($container->privates['stimulus.asset_mapper.loader_javascript_compiler'])) {
            return $container->privates['stimulus.asset_mapper.loader_javascript_compiler'];
        }

        return $container->privates['stimulus.asset_mapper.loader_javascript_compiler'] = new \Symfony\UX\StimulusBundle\AssetMapper\StimulusLoaderJavaScriptCompiler($a, true);
    }
}
