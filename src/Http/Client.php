<?php

namespace Liantong\Zop\Http;

trait Client
{
    use AuthService;

    public static $client;

    public function httpClient()
    {
        if (!self::$client) {
            self::$client = new Http(self::getAppConfig()['baseUri']);
        }

        return self::$client;
    }


    /**
     * 发送 get 请求
     *
     * @param string $endpoint
     * @param array  $query
     * @param array  $headers
     *
     * @return mixed
     */
    public function get($endpoint, $query = [], $headers = [])
    {
        $query = $this->generateParams($query);

        return $this->httpClient()->request('get', $endpoint, [
            'headers' => $headers,
            'query' => $query,
        ]);
    }

    /**
     * 发送 post 请求
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return mixed
     */
    public function post($endpoint, $params = [], $headers = [])
    {
        $params = $this->generateParams($params);

        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * 用 json 的方式发送 post 请求
     *
     * @param $endpoint
     * @param array $params
     * @param array $headers
     *
     * @return mixed
     */
    public function postJosn($endpoint, $params = [], $headers = [])
    {
        $params = $this->generateParams($params);

        return $this->httpClient()->request('post', $endpoint, [
            'headers' => $headers,
            'json' => $params,
        ]);
    }

    /**
     * 组合公共参数、业务参数.
     * @param array  $params 业务参数
     */
    protected function generateParams(array $params)
    {
        $head = $this->getHead();

        $reqObj = [
            'head' => $head,
            'body' => $params
        ];

        $reqObj = $this->encrypt(json_encode($reqObj), self::getAppConfig()['AES']);

        return [
            'appCode' => self::getAppConfig()['appCode'],
            'reqObj' => $reqObj
        ];
    }
}
