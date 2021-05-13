<?php

namespace Liantong\Zop\Core;

class Container implements \ArrayAccess
{
    /**
     * @var array
     */
    private $instances = [];

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var
     */
    public $register;

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @param mixed $offset
     *
     * @return $this|mixed
     */
    public function offsetGet($offset)
    {
        if (!isset($this->instances[$offset])) {
            $this->instances[$offset] = $this->values[$offset]($this);
        }

        return $this->instances[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * 注册服务
     *
     * @param $provider
     *
     * @return $this
     */
    public function serviceRegsiter($provider)
    {
        $provider->serviceProvider($this);

        return $this;
    }
}
