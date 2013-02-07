<?php
/**
 * Copyright (c) 2013 Gijs Kunze
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GWK\MailjetBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GWKMailjetExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $resolved = array();
        foreach($config as $key => $value) {
            $resolved[$key] = $container->getParameterBag()->resolveValue($value);
        }
        $debug_level = $resolved['debug_level'];
        if(!$resolved['debug']) {
            $debug_level = 0;
        }

        $definition = new Definition("Mailjet");
        $definition->setProperty("debug", $debug_level);
        $definition->setArguments(array($resolved['api_key'], $resolved['secret_key'], $resolved['format'], $debug_level));
        $definition->setFactoryClass("GWK\\MailjetBundle\\Factory\\Factory");
        $definition->setFactoryMethod("create");

        $container->setDefinition("mailjet", $definition);
    }
}
