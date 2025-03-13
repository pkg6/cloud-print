基于[快递100](https://api.kuaidi100.com/document/5f0ff6adbc8da837cbd8aef8)的 PHP 接口组件

~~~
<?php

require 'vendor/autoload.php';

$printer = \Pkg6\CloudPrint\Factory::Kuaidi100([
    'key' => '',
    'secret' => '',
])->printer;

//获取某台打印机状态
$printer->status($param);

//电子面单打印接口
$printer->orderPrint($param);

//电子面单重复打印
$printer->orderRptPrint($param);

//电子面单图片接口
$printer->picPrint($param);

//电子面单HTML接口
$printer->htmlPrint($param);
//国际电子面单
$printer->intPrint($param);
//自定义打印接口
$printer->customPrint($param);
//附件打印接口
$printer->customAttPrint($param);
//自定义生成图片接口
$printer->customPicPrint($param);
//自定义复打接口
$printer->customRptPrint($param);
~~~