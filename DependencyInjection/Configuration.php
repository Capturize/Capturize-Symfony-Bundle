<?php

namespace Capturize\ExtensionBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('capturize_extension');

        $rootNode
            ->children()
                ->scalarNode('public_key')->end()
                ->scalarNode('private_key')->end()
                ->scalarNode('browser_width')->end()
                ->scalarNode('browser_height')->end()
                ->scalarNode('quality')->end()
                ->scalarNode('crop_x')->end()
                ->scalarNode('crop_y')->end()
                ->scalarNode('crop_width')->end()
                ->scalarNode('crop_height')->end()
                ->scalarNode('resize_width')->end()
                ->scalarNode('resize_height')->end()
            ->end()
        ;
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
