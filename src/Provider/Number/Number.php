<?php


namespace Liantong\Zop\Provider\Number;

use Liantong\Zop\Core\BaseService;

class Number extends BaseService
{
    /**
     * 选号获取
     * @param array $params
     * @return array|string[]
     */
    public function select(array $params) : array
    {
        try {
            $result = $this->postJosn('link/num/select/v1', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }

    /**
     * 号码状态变更服务
     * @param array $params
     * @return array|string[]
     */
    public function stateChange(array $params) : array
    {
        try {
            $result = $this->postJosn('link/num/state/change/v1', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }
}