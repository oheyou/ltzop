<?php

namespace Liantong\Zop\Interfaces;

use Liantong\Zop\Core\Container;

interface Provider
{
    /**
     * @return mixed
     */
    public function serviceProvider(Container $container);
}
