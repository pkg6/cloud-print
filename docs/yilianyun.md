基于[易联云](https://www.yilianyun.net/)的 PHP 接口组件

~~~
<?php

require 'vendor/autoload.php';

$printer = \Pkg6\CloudPrint\Factory::Yilianyun([
    'client_id'     => '',
    'client_secret' => '',
])->printer;

// 每个接口都需要传，在request已经帮你生成好，在调用接口都时候传入没有传都参数
$public_params = [
    'client_id' => '',
    'sign'      => '',
    'timestamp' => '',
    'id'        => ''
];

// 终端授权 (永久授权)
$printer->register([
    'machine_code' => '',//易联云打印机终端号
    'msign'        => '',//易联云终端密钥
    'phone'        => '',//手机卡号码(可填)
    'print_name'   => '',//自定义打印机名称(可填)
]);

//删除终端授权
$printer->delete([
    'machine_code' => '',//易联云打印机终端号
]);

//获取终端状态接口
$printer->status([
    'machine_code' => '',//易联云打印机终端号
]);

//关机重启接口
$printer->restart([
    'machine_code'  => '',//易联云打印机终端号,
    'response_type' => '',//重启:restart,关闭:shutdown
]);

//关机重启接口
$printer->setSound([
    'machine_code'  => '',//易联云打印机终端号,
    'response_type' => '',//蜂鸣器:buzzer,喇叭:horn
    'voice'         => '',//[0,1,2,3] 4种音量设置
]);

//获取订单状态接口
$printer->orderState([
    'machine_code' => '',//易联云打印机终端号
    'order_id'     => '',//易联云打印机终端号
]);
//获取订单列表接口
$printer->orderState([
    'machine_code' => '',//易联云打印机终端号
    'page_index'   => 1,//查询条件—当前页码,暂只提供前3页数据
    'page_size'    => 100 //查询条件—每页显示条数,每页最大条数100
]);

//取消单条未打印订单
$printer->clean([
    'machine_code' => '',//易联云打印机终端号
    'order_id'     => '',//通过打印接口返回的订单号
]);

//取消所有未打印订单
$printer->cleanAll([
    'machine_code' => '',//易联云打印机终端号
]);

//设置内置语音接口
$printer->setVoice([
    'machine_code' => '',//易联云打印机终端号
    'content'      => '',//播报内容 , 音量(1~9) , 声音类型(0,1,3,4) 组成json ! 示例 ["测试",9,0] 或者是在线语音链接! 语音内容请小于24kb
    'is_file'      => '',//true or false , 判断content是否为在线语音链接，格式MP3
    'aid'          => '',//0~9 , 定义需设置的语音编号,若不提交,默认升序
]);
//删除内置语音接口
$printer->deleteVoice([
    'machine_code' => '',//易联云打印机终端号
    'aid'          => '',//0~9 , 定义需设置的语音编号,若不提交,默认升序
]);


//文本打印
$printer->textPrint([
    'machine_code' => '',//易联云打印机终端号
    'content'      => '',//打印内容(需要urlencode)，排版指令详见打印机指令
    'origin_id'    => '',//商户系统内部订单号，要求32个字符内，只能是数字、大小写字母 ，且在同一个client_id下唯一。详见商户订单号
]);

//图形打印
$printer->picPrint([
    'machine_code' => '',//易联云打印机终端号
    'picture_url'  => '',//线上图片地址,格式为 jpg，jpeg，png ， K4图片宽度不能超过384像素。理论上图片 （像素宽/8）*像素高 不能超过 100*1024。K5图片宽度不能超过108*8像素。理论上图片 （像素宽/8）*像素高 不能超过 200*1024。
    'origin_id'    => '',//商户系统内部订单号，要求32个字符内，只能是数字、大小写字母 ，且在同一个client_id下唯一。详见商户订单号
]);

//面单打印 http://doc2.10ss.net/631855
$printer->expressPrint([
    'machine_code' => '',//易联云打印机终端号
    'origin_id'    => '',//商户系统内部订单号，要求32个字符内，只能是数字、大小写字母 ，且在同一个client_id下唯一。详见商户订单号
    'content'      => '', //http://doc2.10ss.net/631855
    'sandbox'      => '',//1沙箱环境调用，非必传参数，正式环境可以不传入sandbox
]);
~~~
