<?php


namespace Liantong\Zop\Provider\Captcha;

use Liantong\Zop\Core\Container;
use Liantong\Zop\Interfaces\Provider;

class CaptchaProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Captcha'] = function ($container) {
            return new Captcha($container);
        };
    }
}