<?php

namespace Liantong\Zop\Provider\Order;

use Liantong\Zop\Core\BaseService;

class Order extends BaseService
{

    /**
     * 意向单同步
     * @param array $params
     * @return array|string[]
     */
    public function preSync(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/card/preOrder/preOrdersync', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }

    /**
     * 正式单同步
     * @param array $params
     * @return array|string[]
     */
    public function sync(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/card/preOrder/ordersync', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }
}
