<?php

namespace Webeith\ImapBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('webeith_imap');

        $rootNode
            ->children()
                ->arrayNode('mailboxes')
                    ->isRequired()
                    ->prototype('array') ->children()
                        ->scalarNode('login')
                            ->isRequired()
                            ->end()
                        ->scalarNode('password')
                            ->isRequired()
                            ->end()
                        ->scalarNode('connection_string')
                            ->isRequired()
                            ->end()
                        ->scalarNode('encoding')
                            ->isRequired()
                            ->end()
                        ->scalarNode('attachments_dir')
                            ->isRequired()
                            ->end()
                ->end();

        return $treeBuilder;
    }
}
