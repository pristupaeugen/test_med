<?php

namespace AppBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('app_bundle');

        $rootNode
            ->children()
                ->arrayNode('mail')
                    ->children()
                        ->arrayNode('reset_password')
                            ->children()
                                ->scalarNode('from')->end()
                            ->end()
                        ->end()

                        ->arrayNode('confirm_email')
                            ->children()
                                ->scalarNode('from')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}