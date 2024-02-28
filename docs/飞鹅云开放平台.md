基于 [飞鹅云开放平台](http://help.feieyun.com/document.php) 的 PHP 接口组件

~~~
<?php
require 'vendor/autoload.php';

$printer = \Pkg6\cloudPrint\Factory::Feieyun([
    'user' => '',
    'ukey' => '',
])->printer;

////每个接口都需要传，在request已经帮你生成好，在调用接口都时候传入没有传都参数
$public_params= [
    'user'    => '',
    'stime'   => '',
    'sig'     => '',
    'apiname' => ''//可以理解请求地址,
];

//批量添加打印机
$private_params = ['printerContent' => '316500010 # abcdefgh # 快餐前台 # 13688889999'];
$printer->register($private_params);
//打印订单
$private_params = [
    'sn'      => '',
    'content' => '',
    'times'   => 1
];
$printer->msg($private_params);
//或
$printer->print($printer,'');

//标签机打印订单
$private_params = [
    'sn'      => '',
    'content' => '',
    'times'   => 1,
    'img'     => '',
];
$printer->labelMsg($private_params);
//或
$printer->print($printer,'label');


//删除批量打印机
$private_params = [
    'snlist' => '',
];
$printer->delete($private_params);

//修改打印机信息
$private_params = [
    'sn'       => '',
    'name'     => '',
    'phonenum' => '',
];
$printer->delete($private_params);

//清空待打印队列
$private_params = [
    'sn' => '',
];
$printer->clean($private_params);

//查询订单是否打印成功
$private_params = [
    'orderid' => '',
];
$printer->orderState($private_params);

//查询指定打印机某天的订单统计数，Open_queryOrderInfoByDate
$private_params = [
    'sn'   => '',
    'date' => '',
];
$printer->orderInfoByDate($private_params);

//获取某台打印机状态
$private_params = [
    'sn' => '',
];
$printer->status($private_params);
~~~


