<?php

/*
 * Mineur/twitter-stream-api-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\TwitterStreamApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class TwitterStreamApiExtension
 * @package Mineur\TwitterStreamApiBundle\DependencyInjection
 */
class TwitterStreamApiClientExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yml');
        
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $def = $container->getDefinition('twitter_stream_api_client');
        $def->replaceArgument(0, $config['twitter']['consumer_key']);
        $def->replaceArgument(1, $config['twitter']['consumer_secret']);
        $def->replaceArgument(2, $config['twitter']['access_token']);
        $def->replaceArgument(3, $config['twitter']['access_token_secret']);
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'twitter_stream_api_client';
    }
}