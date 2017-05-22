<?php

namespace DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class TwitterStreamApiConfiguration
 * @package DependencyInjection
 */
class TwitterStreamApiConfiguration implements ConfigurationInterface
{
    /**
     * Get config tree builder
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('twitter_stream_api');

        $rootNode
            ->children()
                ->arrayNode('twitter')
                    ->children()
                        ->scalarNode('consumer_key')
                            ->isRequired()
                            ->end()
                        ->scalarNode('consumer_secret')
                            ->isRequired()
                            ->end()
                        ->scalarNode('access_token')
                            ->isRequired()
                            ->end()
                        ->scalarNode('access_token_secret')
                            ->isRequired()
                            ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}