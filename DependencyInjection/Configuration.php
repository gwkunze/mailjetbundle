<?php
/**
 * Copyright (c) 2013 Gijs Kunze
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GWK\MailjetBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('gwk_mailjet');

        $formats = array("php", "json", "xml", "serialize", "html", "csv");

        $rootNode->children()
            ->scalarNode('api_key')->isRequired()->end()
            ->scalarNode('secret_key')->isRequired()->end()
            ->enumNode('format')->cannotBeEmpty()->defaultValue('json')->values($formats)->end()
            ->scalarNode('debug')->cannotBeEmpty()->defaultValue('%kernel.debug%')->end()
            ->scalarNode('debug_level')->cannotBeEmpty()->defaultValue(1)->end()
        ;

        return $treeBuilder;
    }
}
