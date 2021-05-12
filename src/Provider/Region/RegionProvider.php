<?php


namespace Liantong\Zop\Provider\Region;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class RegionProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Region'] = function ($container) {
            return new Region($container);
        };
    }
}