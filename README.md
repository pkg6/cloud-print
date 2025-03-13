<p align="center">
	<strong>云小票机SDK-cloud-print</strong>
</p>




> 非官方云小票机SDK，支持飞鹅云，芯烨云，易联云，快递100，映美云，中午云，佳博云，优声云，365智能云打印等



## 安装

~~~
composer require pkg6/cloud-print
~~~

## 自定义缓存

> 基于https://packagist.org/packages/psr/simple-cache#1.0
>
> ```
> public function setCache(CacheInterface $cache);
> ```

## 自定义日志

> 基于 https://packagist.org/packages/psr/log
>
> ```
> public function setRequestLogger(LoggerInterface $logger)
> //自定义日志格式（借助guzzlehttp/guzzle中的handler）进行实现
> public function setLogFormatter(string $logFormatter);
> ```

## 适配模式

> 需要定义的服务商实现客户端
>
> ```
> interface ClientInterface
> {
>     public function setCache(CacheInterface $cache);
>     /**
>      * @param \Psr\Log\LoggerInterface $logger
>      * @return $this
>      */
>     public function setRequestLogger(LoggerInterface $logger);
> 
>     /**
>      * @param string $logFormatter
>      * @return $this
>      * @see MessageFormatter
>      */
>     public function setLogFormatter(string $logFormatter);
> 
>     /**
>      * @param $requestUrl
>      * @return $this
>      */
>     public function setRequestUrl($requestUrl);
> 
>     /**
>      * @return string
>      */
>     public function getRequestUrl();
> 
>     /**
>      * @param $method
>      * @param $action
>      * @param $privateParams
>      * @return mixed
>      */
>     public function request($method, $action, $privateParams);
> }
> ```

### 配置

~~~
$config =[
    // 默认发送配置
    'default' => "feieyun",
    // 可用的网关配置
    'clients' => [
        "feieyun" => [
            "type" => 'feieyun',
            'user' => "",
            'ukey' => "",
        ],
        'jolimark' => [
            "type" => 'jolimark',
            'app_id' => "",
            'app_key' => "",
        ],
        // 需要自己setRequestUrl传入url
        'kuaidi100' => [
            "type" => 'kuaidi100',
            'key' => "",
            'secret' => "",
        ],
        'poscom' => [
            "type" => 'poscom',
            'memberCode' => "",
            'apiKey' => "",
        ],
        'ushengyun' => [
            "type" => 'ushengyun',
            'appId' => "",
            'appSecret' => "",
        ],
        'xpyun' => [
            "type" => 'xpyun',
            "user" => "",
            "userKey" => "",
        ],
        'yilianyun' => [
            "type" => 'yilianyun',
            'client_id' => "",
            'client_secret' => "",
        ],
        'zhongwuyun' => [
            "type" => 'zhongwuyun',
            'appid' => "",
            'appsecret' => "",
        ],
    ],
~~~

### 实例化

~~~
$cloudPrint = new CloudPrint($config)
//自定义驱动
$cloudPrint->client("zhongwuyun")->request($method, $action, $privateParams)
//默认驱动
$cloudPrint->request($method, $action, $privateParams)
~~~

## 门脸模式

> 可以直接到实现请求的客户端，内置很多方法可以供使用

### 基于[中午云](http://www.zhongwu.co/)的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Zhongwuyun([
    'appid'     => '******',
    'appsecret' => '******',
]);
~~~

### 基于 [优声云](https://www.ushengyun.com/) 的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Ushengyun([
    'appId'     => '10001',
    'appSecret' => '**********',
]);
~~~

### 基于[佳博云](https://dev.poscom.cn/)的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Poscom([
    'memberCode' => '',
    'apiKey'     => '',
]);
~~~

### 基于[快递100](https://api.kuaidi100.com/document/5f0ff6adbc8da837cbd8aef8)的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Kuaidi100([
    'key' => '',
    'secret' => '',
]);
~~~

### 基于[易联云](https://www.yilianyun.net/)的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Yilianyun([
    'client_id'     => '',
    'client_secret' => '',
]);
~~~

### 基于[映美云](http://open.jolimark.com/)的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Jolimark([
    'app_id'  => '',
    'app_key' => '',
]);
~~~

### 基于 [芯烨云](https://www.xpyun.net/open/index.html) 的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Xpyun([
    'user'    => '',
    'userKey' => '',
]);
~~~

### 基于 [飞鹅云](http://help.feieyun.com/document.php) 的 PHP 接口组件

~~~
$printer = \Pkg6\CloudPrint\Factory::Feieyun([
    'user' => '',
    'ukey' => '',
]);
~~~


## 支持厂商

- [飞鹅云](http://help.feieyun.com/document.php) 
- [芯烨云](https://www.xpyun.net/open/index.html)
- [易联云](https://www.yilianyun.net/)
- [快递100](https://api.kuaidi100.com/document/5f0ff6a32977d50a94e10235)
- [映美云](http://open.jolimark.com/)
- [佳博云](https://dev.poscom.cn/)
- [中午云](http://www.zhongwu.co/)
- [优声云](https://www.ushengyun.com/)




##  加入我们

如果你认可我们的开源项目，有兴趣为 cloud-print 的发展做贡献，竭诚欢迎加入我们一起开发完善。无论是 报告错误issues 或是 Pull Request 开发，那怕是修改一个错别字也是对我们莫大的帮助。


##  许可协议
[MIT](https://opensource.org/licenses/MIT)

