<?php

namespace RestBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class RestBundleExtension
 * @package RestBundle\DependencyInjection
 */
class RestBundleExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('rest_bundle.application_keys.ios',     $config['application_keys']['ios']);
        $container->setParameter('rest_bundle.application_keys.android', $config['application_keys']['android']);
    }
}