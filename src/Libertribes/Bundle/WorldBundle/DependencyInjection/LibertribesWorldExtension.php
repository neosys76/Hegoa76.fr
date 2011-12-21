<?php

namespace Libertribes\Bundle\WorldBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

use Libertribes\Component\World\LandType;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LibertribesWorldExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('libertribes_world.world.width', $config['width']);
        $container->setParameter('libertribes_world.world.height', $config['height']);
        
        $container->setParameter('libertribes_world.world.image', $config['image']);
        
        $container->setParameter('libertribes_world.panels', $config['panels']);
        
        $container->setParameter('libertribes_world.lands', $config['lands']);
        
        $container->setParameter('libertribes_world.section.width', $config['section']['width']);
        $container->setParameter('libertribes_world.section.height', $config['section']['height']);
        $container->setParameter('libertribes_world.section.directory.internal', $config['section']['directory']['internal']);
        $container->setParameter('libertribes_world.section.directory.external', $config['section']['directory']['external']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
