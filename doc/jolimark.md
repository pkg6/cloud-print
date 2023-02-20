基于[映美云](http://open.jolimark.com/)的 PHP 接口组件

~~~
<?php

require 'vendor/autoload.php';

$printer = \Pkg6\cloudPrint\Factory::Jolimark([
    'app_id'  => '',
    'app_key' => '',
])->printer;

//绑定打印机
$printer->register([
    'device_codes' => '',
]);
//解绑打印机
$printer->delete([
    'device_codes' => '',
]);
//获取未打印列表
$printer->orderNotPrint([
    'device_codes' => '',
]);
//取消打印任务
$printer->clean([
    'device_codes' => '',
]);


//打印映美规范HTML页面-传HTML代码
$printer->html2Print([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
    'tex'          => '',
]);
//打印标准规范HTML页面-传HTML代码
$printer->htmlPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
    'tex'          => '',
]);
//打印映美规范HTML页面-传URL地址
$printer->urlPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印标准规范HTML页面-传URL
$printer->picPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印标准规范html页面-转灰度图
$printer->grayPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印ESC指令
$printer->printEsc([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印定点坐标文本
$printer->pointTextPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印标签接口
$printer->labelPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印快递面单
$printer->expressPrint([
    'device_ids'  => '',
    'copies'      => '',
    'cus_orderid' => '',
    'template_id' => '',
    'jj_dwmc'     => '',
    'jj_jjr'      => '',
    'jj_lxdh'     => '',
    'jj_dz'       => '',
    'sj_dwmc'     => '',
    'sj_sjr'      => '',
    'sj_lxdh'     => '',
    'sj_dz'       => '',
    'wp_jtw'      => '',
    'wp_smjz'     => '',
    'time_out'    => '',
]);
//打印云模版
$printer->printTemp([
    'device_ids'   => '',
    'template_id'  => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);

//打印本地文档
$printer->filePrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'paper_width'  => '',
    'paper_height' => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//打印远程文档
$printer->fileByUrlPrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'file_type' => '',
    'bill_content'  => '',
    'paper_width' => '',
    'paper_height'   => '',
    'paper_type'   => '',
    'time_out'     => '',
]);
//增值税专用发票打印
$printer->invoicePrint([
    'device_ids'   => '',
    'copies'       => '',
    'cus_orderid'  => '',
    'bill_content' => '',
    'time_out'     => '',
]);


~~~
