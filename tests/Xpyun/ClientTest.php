<?php

namespace Pkg6\CloudPrint\Tests\Xpyun;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testAddPrinters()
    {
        $private_params = ['items' => [['name' => '', 'sn' => '']]];
        $this->methodPrivateParams('addPrinters', $private_params);
    }

    public function testPrint()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'copies' => 1,
            'voice' => '',
            'mode' => '',
            'expiresIn' => '',
            'payType' => '',
            'payMode' => '',
            'money' => '',
        ];
        $this->methodPrivateParams('print', $private_params);
    }

    public function testLabelMsg()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'copies' => 1,
            'voice' => '',
            'mode' => '',
            'expiresIn' => '',
            'payType' => '',
            'payMode' => '',
            'money' => '',
        ];
        $this->methodPrivateParams('printLabel', $private_params);
    }

    public function testDelPrinters()
    {
        $private_params = [
            'snlist' => '',
        ];
        $this->methodPrivateParams('delPrinters', $private_params);
    }

    public function testUpdPrinter()
    {
        $private_params = [
            'sn' => '',
            'name' => '',
            'cardno' => '',
        ];
        $this->methodPrivateParams('updPrinter', $private_params);
    }

    public function testDelPrinterQueue()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('delPrinterQueue', $private_params);
    }

    public function testQueryOrderState()
    {
        $private_params = [
            'orderid' => '',
        ];
        $this->methodPrivateParams('queryOrderState', $private_params);
    }

    public function testQueryOrderStatis()
    {
        $private_params = [
            'sn' => '',
            'date' => '',
        ];
        $this->methodPrivateParams('queryOrderStatis', $private_params);
    }

    public function testQueryPrinterStatus()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('queryPrinterStatus', $private_params);
    }

    public function testQueryPrintersStatus()
    {
        $private_params = [
            'snlist' => '',
        ];
        $this->methodPrivateParams('queryPrintersStatus', $private_params);
    }

    public function testSetVoiceType()
    {
        $private_params = [
            'sn' => '',
            'voiceType' => '',
        ];
        $this->methodPrivateParams('setVoiceType', $private_params);
    }

    public function testPlayVoice()
    {
        $private_params = [
            'sn' => '',
            'payType' => '',
            'payMode' => '',
            'money' => '',
        ];
        $this->methodPrivateParams('playVoice', $private_params);
    }

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Xpyun();
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}