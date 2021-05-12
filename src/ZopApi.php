<?php

/**
 * 联通zop服务
 * author: oheyou
 */

namespace Liantong\Zop;

use Liantong\Zop\Core\ContainerBase;
use Liantong\Zop\Http\AuthService;
use Liantong\Zop\Provider\Region\RegionProvider;
use Liantong\Zop\Provider\Identity\IdentityProvider;
use Liantong\Zop\Provider\Captcha\CaptchaProvider;
use Liantong\Zop\Provider\Number\NumberProvider;
use Liantong\Zop\Provider\Order\OrderProvider;
use Liantong\Zop\Provider\Risk\RiskProvider;


class ZopApi extends ContainerBase
{
    use AuthService;

    /**
     * 配置服务提供者.
     * @var string[]
     */
    protected $provider = [
        RegionProvider::class,
        IdentityProvider::class,
        CaptchaProvider::class,
        NumberProvider::class,
        OrderProvider::class,
        RiskProvider::class,
    ];

    public function __construct(array $config, string $provider=null)
    {
        parent::__construct($provider);
        AuthService::setAppConfig($config);
    }
}
