<?php

namespace Libertribes\Bundle\WorldBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('world');

        $rootNode
            ->children()
                ->scalarNode('width')->isRequired()->end()
                ->scalarNode('height')->isRequired()->end()
                ->scalarNode('image')->isRequired()->end()
                ->arrayNode('cartographer')->isRequired()
                    ->children()
                        ->scalarNode('directory')->isRequired()->end()
                    ->end()
                ->end()
                ->arrayNode('sections')->isRequired()
                    ->children()
                        ->scalarNode('width')->isRequired()->end()
                        ->scalarNode('height')->isRequired()->end()
                        ->scalarNode('directory')->isRequired()->end()
                    ->end()
                ->end()
                ->arrayNode('lands')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('color')->isRequired()->end()
                            ->scalarNode('name')->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('panels')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('name')->isRequired()->end()
                            ->arrayNode('tiles')->isRequired()
                                ->children()
                                    ->scalarNode('directory')->isRequired()->end()
                                    ->scalarNode('width')->isRequired()->end()
                                    ->scalarNode('height')->isRequired()->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}
