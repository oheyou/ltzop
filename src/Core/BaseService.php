<?php

namespace Liantong\Zop\Core;

use Liantong\Zop\Http\Client;

class BaseService
{
    use Client;

    protected $app;

    public $appRunConfig = [];

    public $header = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json;charset=utf-8',
    ];

    public function __construct(Container $app)
    {
        $this->app = $app;

        $this->appRunConfig = self::getAppConfig();
    }
}
