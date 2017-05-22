<?php

namespace Mineur\TwitterStreamApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class TwitterStreamApiExtension
 * @package Mineur\TwitterStreamApiBundle\DependencyInjection
 */
class TwitterStreamApiExtension extends ConfigurableExtension
{
    /**
     * @param array $mergedConfig
     * @param ContainerBuilder $container
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $container->setParameter('twitter.consumer_key',
            $mergedConfig['twitter']['consumer_key']
        );
        $container->setParameter('twitter.consumer_secret',
            $mergedConfig['twitter']['consumer_secret']
        );
        $container->setParameter('twitter.access_token',
            $mergedConfig['twitter']['access_token']
        );
        $container->setParameter('twitter.access_token_secret',
            $mergedConfig['twitter']['access_token_secret']
        );

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('services.yml');
    }
}