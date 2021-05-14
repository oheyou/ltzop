# ltzop
liantong zop service

## 环境需求

```js
PHP >= 7.1
PHP cURL 扩展
PHP OpenSSL 扩展
```
    
## Installing

```shell
$ composer require oheyou/ltzop dev-main
$ composer require guzzlehttp/guzzle  #guzzle依赖，如类库已存在请忽略
```

## Usage

```

require __DIR__ .'/vendor/autoload.php';

use Liantong\Zop\ZopApi;

date_default_timezone_set('PRC');

$test = true;

$config = [
	'appCode' => '你的appCode',
	'HMACMD5' => '你的HMACMD5',
	'AES' => '你的AES',
	'baseUri' => !$test?'http://cd.10010.com/zop/':'http://demo.mall.10010.com:8104/zop/',
	'channel' => '你的channel',
];

$app = new ZopApi($config);

#1.开始调用接口 
$result = $app->Region->qry(['provinceCode'=>34]); //获取城市列表

$result = $app->Captcha->send([
            'certId' => '身份证号码',
            'contactNum' => '手机号',
            'channel' => $config['channel'],
        ]); //发送验证码
		
- 获取号码 $app->Number->select(array $param)
- 意向订单同步 $app->Order->preSync(array $param)
- 号码状态变更服务 $app->Number->stateChange(array $param)
- 正式单同步 $app->Order->sync(array $param)
- 验证码校验 $app->Captcha->check(array $param)
- 身份验证 $app->Identity->cust(array $param)
- 风控校验 $app->Risk->check(array $param)