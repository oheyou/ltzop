<?php


namespace Liantong\Zop\Provider\Risk;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class RiskProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Risk'] = function ($container) {
            return new Risk($container);
        };
    }
}