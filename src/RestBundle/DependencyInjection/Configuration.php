<?php

namespace RestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package AppBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rest_bundle');

        $rootNode
            ->children()
                ->arrayNode('application_keys')
                    ->children()
                        ->scalarNode('ios')->end()
                        ->scalarNode('android')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}