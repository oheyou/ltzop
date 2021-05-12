<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Liantong\Zop\Provider\Order;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class OrderProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Order'] = function ($container) {
            return new Order($container);
        };
    }
}
