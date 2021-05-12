<?php

/**
 * 接口权限验证（签名）
 */
namespace Liantong\Zop\Http;

trait AuthService
{
    protected static $appConfig;

    public static function setAppConfig(array $appConfig)
    {
        self::$appConfig = $appConfig;
    }

    public static function getAppConfig()
    {
        return self::$appConfig;
    }

    /**
     * 请求头
     * @return array
     */
    function getHead() {
        $uuid = $this->uuid();
        $timestamp = $this->getTimestamp();
        return [
            'uuid' => $uuid,
            'timestamp' => $timestamp,
            'sign' => $this->genSign($uuid, $timestamp),
        ];
    }

    /**
     * uuid 唯一序列码
     * @param string $prefix
     * @return string
     */
    function uuid($prefix = '')
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr($chars, 0, 8) . '-';
        $uuid .= substr($chars, 8, 4) . '-';
        $uuid .= substr($chars, 12, 4) . '-';
        $uuid .= substr($chars, 16, 4) . '-';
        $uuid .= substr($chars, 20, 12);
        return $prefix . $uuid;
    }

    /**
     * 时间戳
     * @return string
     */
    function getTimestamp()
    {
        date_default_timezone_set('PRC');
        list($msec, $sec) = explode(' ', microtime());
        $time = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return date('Y-m-d H:i:s.') . substr($time, -3);
    }

    /**
     * 生成签名
     * @param $uuid
     * @param $timestamp
     * @return mixed
     */
    function genSign($uuid, $timestamp)
    {
        $dataStr = 'appCode' .self::getAppConfig()['appCode'] . 'timestamp' . $timestamp . 'uuid' . $uuid . self::getAppConfig()['HMACMD5'];
        return $this->sign(self::getAppConfig()['HMACMD5'], $dataStr);
    }

    /**
     * 签名
     * @param key 密钥  联通侧提供的HmacMD5
     * @param dataStr appCode+appCode值+timestamp+timestamp值*+uuid+uuid值+HmacMD5密钥值
     */
    private function sign($key, $dataStr)
    {
        return base64_encode(hash_hmac("md5", $dataStr, base64_decode($key), true));
    }

    /**
     * AES加密
     * @param $data
     * @param $key
     * @return string
     */
    function encrypt($data, $key)
    {
        $data = openssl_encrypt($data, 'aes-128-ecb', base64_decode($key), OPENSSL_RAW_DATA);
        return base64_encode($data);
    }
}
