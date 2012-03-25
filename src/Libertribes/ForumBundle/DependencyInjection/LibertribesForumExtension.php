<?php

namespace Libertribes\ForumBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\FileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class LibertribesForumExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        //$loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        //$loader->load('model.xml');
        $this->loadParameters($config, $container);
    }

    private function loadParameters(array $config, ContainerBuilder $container)
    {
        foreach ($config as $groupName => $group) {
            if (is_array($group)) {
                foreach ($group as $name => $value) {
                    if (is_array($value)) {
                        foreach ($value as $subname => $subvalue) {
                            $container->setParameter(sprintf('libertribes_forum.%s.%s.%s', $groupName, $name, $subname), $subvalue);                    
                        }
                    }else{
                        $container->setParameter(sprintf('libertribes_forum.%s.%s', $groupName, $name), $value);                    
                    }
                }
            } else {
                $container->setParameter(sprintf('libertribes_forum.%s', $groupName), $group);
            }
        }
    }
	
}
