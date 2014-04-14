<?php

namespace Jb\Bundle\PhumborBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class JbPhumborExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('phumbor.server.url', 'http://thumbor.example.com:1234');
        $container->setParameter('phumbor.secret', '1234567890');
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'jb_phumbor';
    }
}