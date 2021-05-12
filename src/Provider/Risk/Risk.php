<?php


namespace Liantong\Zop\Provider\Risk;

use Liantong\Zop\Core\BaseService;

class Risk extends BaseService
{
    /**
     * 风控校验
     * @param array $params
     * @return array|string[]
     */
    public function check(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/risk/check/v1', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }
}