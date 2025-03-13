<p align="center">
	<strong>云小票机SDK-cloud-print</strong>
</p>




> 非官方云小票机SDK，支持飞鹅云，芯烨云，易联云，快递100，映美云，中午云，佳博云，优声云，365智能云打印等



## 安装

~~~
composer require pkg6/cloud-print
~~~


## 请求日志开启
~~~
\Pkg6\CloudPrint\Kernel\BaseClient::$request_log=true;
~~~

## 自定义缓存

> 基于https://packagist.org/packages/psr/simple-cache#1.0

~~~
$printer = \Pkg6\CloudPrint\Factory::Feieyun([
    'user' => '',
    'ukey' => '',
]);
~~~

## 案例

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

