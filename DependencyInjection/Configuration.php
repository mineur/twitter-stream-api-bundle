<?php

namespace Mineur\TwitterStreamApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class TwitterStreamApiConfiguration
 * @package DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Get configuration tree builder
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('twitter_stream_api_client');

        $rootNode
            ->children()
                ->arrayNode('twitter')
                    ->children()
                        ->scalarNode('consumer_key')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('consumer_secret')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('access_token')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('access_token_secret')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}