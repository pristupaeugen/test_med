<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class AppBundleExtension
 * @package AppBundle\DependencyInjection
 */
class AppBundleExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('app_bundle.mail.reset_password.from', $config['mail']['reset_password']['from']);
        $container->setParameter('app_bundle.mail.confirm_email.from',  $config['mail']['confirm_email']['from']);
    }
}