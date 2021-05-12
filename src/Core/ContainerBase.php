<?php

namespace Liantong\Zop\Core;

class ContainerBase extends Container
{
    /**
     * @var array
     */
    protected $provider = [];

    public function __construct(string $provider=null)
    {
        if(!empty($provider)) {
            $obj = new $provider();
            $this->serviceRegsiter($obj);
        } else {
            $providerCallback = function ($provider) {
                $obj = new $provider();
                $this->serviceRegsiter($obj);
            };
            array_walk($this->provider, $providerCallback);
        }
    }

    public function __get($key)
    {
        return $this->offsetGet($key);
    }
}
