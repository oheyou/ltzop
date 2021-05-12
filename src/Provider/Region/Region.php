<?php


namespace Liantong\Zop\Provider\Region;

use Liantong\Zop\Core\BaseService;

class Region extends BaseService
{
    /**
     * 收货地址
     * @param array $params
     * @return array|string[]
     */
    public function qry(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/postInfo/qry', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }
}