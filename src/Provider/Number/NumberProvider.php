<?php


namespace Liantong\Zop\Provider\Number;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class NumberProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Number'] = function ($container) {
            return new Number($container);
        };
    }
}