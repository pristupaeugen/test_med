<?php

namespace RestBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use RestBundle\DependencyInjection\RestBundleExtension;

class RestBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getContainerExtension()
    {
        return new RestBundleExtension();
    }
}
