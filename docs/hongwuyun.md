> 基于[中午云](http://www.zhongwu.co/)的 PHP 接口组件

~~~
<?php

require 'vendor/autoload.php';

$printer = \Pkg6\CloudPrint\Factory::Zhongwuyun([
    'appid'     => '******',
    'appsecret' => '******',
])->printer;


//查询设备状态
$printer->status([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
]);

//查询打印状态
$printer->orderState([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
    'dataid'       => '123',
]);

//清空待打印队列
$printer->clean([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
]);


//清空待打印队列
$printer->cleanOne([
    'dataid' => '123',
]);

//设置音量
$printer->setSound([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
    'sound'        => 3
]);

//设置语音（未上线） 此接口仅对AI语音版打印机有效，Z1,Z1S,T1,Z1-GPRS,Z1-WIFI.Z1-GPRS-WIFI机型语音请移步附录-排版引擎
$printer->setVoice([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
    'voice'        => base64_encode(',mp3')
]);

//http://www.zhongwu.co/platformPrintTemplate.html
$printer->print([
    'deviceid'     => '1111111',
    'devicesecret' => '11111111',
    'printdata'    => ''
]);

~~~