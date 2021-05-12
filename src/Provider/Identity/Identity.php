<?php


namespace Liantong\Zop\Provider\Identity;

use Liantong\Zop\Core\BaseService;

class Identity extends BaseService
{
    /**
     * 身份信息验证
     * @param array $params
     * @return array|string[]
     */
    public function cust(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/identity/cust/v2', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['aCode'=>'9999', 'aDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['aCode'=>'9999', 'aDesc'=>'数据接口异常'];
    }
}