基于[佳博云](https://dev.poscom.cn/)的 PHP 接口组件

~~~
<?php

require 'vendor/autoload.php';

$printer = \Pkg6\CloudPrint\Factory::Poscom([
    'memberCode' => '',
    'apiKey'     => '',
])->printer;


//查询（打印机）分组列表
$printer->group([]);
//添加（打印机）分组
$printer->addGroup([
    'grpName' => '',
]);


// 修改（打印机）分组名称
//$printer->updateGroup([
//    'grpID'   => '',
//    'grpName' => '',
//]);


//删除（打印机）分组名称
//$printer->delGroup([
//    'grpID' => '',
//]);

//添加打印机
$printer->register([
    'deviceID' => '',
    'devName'  => '',
    'grpID'    => '',
    'mPhone'   => '',
    'nPhone'   => '',
    'cutting'  => '',
]);
//修改设备信息
$printer->update([
    'deviceID' => '',
    'devName'  => '',
    'grpID'    => '',
    'mPhone'   => '',
    'nPhone'   => '',
    'cutting'  => '',
]);

//删除设备
$printer->delete([
    'deviceID' => '',
]);
//查询打印机状态
$printer->status([
    'deviceID' => '',
]);

//取消打印订单
//$printer->clean([
//    'deviceID' => '',
//    'all'      => '',
//]);

//订单状态
$printer->orderState([
    'msgNo' => '',
]);

//打印
$printer->print([
    'charset'   => '',
    'deviceID'  => '',
    'msgDetail' => '',
    'msgNo'     => '',
    'reprint'   => '',
    'multi'     => '',
    'mode'      => '',
    'times'     => '',
    'voice'     => '',
]);

//设置打印机语音类型
$printer->setVoice([
    'deviceID' => '',
    'volume'   => '',
]);

//打印机切换播报类型
$printer->setVoiceType([
    'deviceID'  => '',
    'voiceType' => '',
]);
//模板列表
$printer->listTemplate([]);
//指定模板打印
$printer->setTempletPrint([
    'deviceID'  => '',
    'templetID' => '',
    'tData'     => '',
    'charset'   => '',
    'msgNo'     => '',
    'reprint'   => '',
    'multi'     => '',
]);
~~~