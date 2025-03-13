<?php

namespace Pkg6\CloudPrint\Tests\Yilianyun;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testAddPrinter()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'msign' => '', //易联云终端密钥
            'phone' => '', //手机卡号码(可填)
            'print_name' => '', //自定义打印机名称(可填)
        ];
        $this->methodPrivateParams('addPrinter', $private_params);
    }

    public function testDeletePrinter()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
        ];
        $this->methodPrivateParams('deletePrinter', $private_params);
    }

    public function testGetPrintStatus()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
        ];
        $this->methodPrivateParams('getPrintStatus', $private_params);
    }

    public function testShutdownreStart()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'response_type' => '', //重启:restart,关闭:shutdown
        ];
        $this->methodPrivateParams('shutdownreStart', $private_params);
    }

    public function testSetSound()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号,
            'response_type' => '', //蜂鸣器:buzzer,喇叭:horn
            'voice' => '', //[0,1,2,3] 4种音量设置
        ];
        $this->methodPrivateParams('setSound', $private_params);
    }

    public function testGetOrderStatus()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'page_index' => 1, //查询条件—当前页码,暂只提供前3页数据
            'page_size' => 100, //查询条件—每页显示条数,每页最大条数100
        ];
        $this->methodPrivateParams('getOrderStatus', $private_params);
    }

    public function testCancelOne()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'order_id' => '', //通过打印接口返回的订单号
        ];
        $this->methodPrivateParams('cancelOne', $private_params);
    }

    public function testCancelAll()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
        ];
        $this->methodPrivateParams('cancelAll', $private_params);
    }

    public function testSetVoice()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'content' => '', //播报内容 , 音量(1~9) , 声音类型(0,1,3,4) 组成json ! 示例 ["测试",9,0] 或者是在线语音链接! 语音内容请小于24kb
            'is_file' => '', //true or false , 判断content是否为在线语音链接，格式MP3
            'aid' => '', //0~9 , 定义需设置的语音编号,若不提交,默认升序
        ];
        $this->methodPrivateParams('setVoice', $private_params);
    }

    public function testDeleteVoice()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'aid' => '', //0~9 , 定义需设置的语音编号,若不提交,默认升序
        ];
        $this->methodPrivateParams('deleteVoice', $private_params);
    }

    public function testPrint()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'content' => '', //打印内容(需要urlencode)，排版指令详见打印机指令
            'origin_id' => '',
        ];
        $this->methodPrivateParams('print', $private_params);
    }

    public function testPicturePrint()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'picture_url' => '', //线上图片地址,格式为 jpg，jpeg，png ， K4图片宽度不能超过384像素。理论上图片 （像素宽/8）*像素高 不能超过 100*1024。K5图片宽度不能超过108*8像素。理论上图片 （像素宽/8）*像素高 不能超过 200*1024。
            'origin_id' => '',
        ];
        $this->methodPrivateParams('picturePrint', $private_params);
    }

    public function testExpressPrint()
    {
        $private_params = [
            'machine_code' => '', //易联云打印机终端号
            'origin_id' => '', //商户系统内部订单号，要求32个字符内，只能是数字、大小写字母 ，且在同一个client_id下唯一。详见商户订单号
            'content' => '', //http://doc2.10ss.net/631855
            'sandbox' => '',
        ];
        $this->methodPrivateParams('expressPrint', $private_params);
    }
    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Yilianyun();
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}