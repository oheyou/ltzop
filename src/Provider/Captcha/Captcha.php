<?php


namespace Liantong\Zop\Provider\Captcha;

use Liantong\Zop\Core\BaseService;

class Captcha extends BaseService
{
    /**
     * 发送
     * @param array $params
     * @return array|string[]
     */
    public function send(array $params) : array
    {
        try {
            $result = $this->postJosn('link/king/card/message/send/v2', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }

    /**
     * 校验
     * @param array $params
     * @return array|string[]
     */
    public function check(array $params)
    {
        try {
            $result = $this->postJosn('link/king/card/message/check/v2', $params, $this->header);
        } catch (\Exception $e) {
            $result = ['rspCode'=>'9999', 'rspDesc'=>$e->getMessage()];
        }

        return is_array($result)?$result:['rspCode'=>'9999', 'rspDesc'=>'数据接口异常'];
    }
}