<?php


namespace Liantong\Zop\Provider\Identity;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class IdentityProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Identity'] = function ($container) {
            return new Identity($container);
        };
    }
}