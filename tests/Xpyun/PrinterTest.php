<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Tests\Xpyun;

use Pkg6\cloudPrint\Tests\BaseTest;
use Pkg6\cloudPrint\Xpyun\Printer;

class PrinterTest extends BaseTest
{
    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Xpyun();
        $client = $this->mockApiClient(Printer::class, $app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }

    public function testRegister()
    {
        $private_params = ['items' => [['name' => '', 'sn' => '']]];
        $this->methodPrivateParams('register', $private_params);
    }

    public function testMsg()
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
        $this->methodPrivateParams('msg', $private_params);
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
        $this->methodPrivateParams('labelMsg', $private_params);
    }

    public function testDelete()
    {
        $private_params = [
            'snlist' => '',
        ];
        $this->methodPrivateParams('delete', $private_params);
    }

    public function testUpdate()
    {
        $private_params = [
            'sn' => '',
            'name' => '',
            'cardno' => '',
        ];
        $this->methodPrivateParams('update', $private_params);
    }

    public function testClean()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('clean', $private_params);
    }

    public function testOrderState()
    {
        $private_params = [
            'orderid' => '',
        ];
        $this->methodPrivateParams('orderState', $private_params);
    }

    public function testOrderInfoByDate()
    {
        $private_params = [
            'sn' => '',
            'date' => '',
        ];
        $this->methodPrivateParams('orderInfoByDate', $private_params);
    }

    public function testStatus()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('status', $private_params);
    }

    public function testAllStatus()
    {
        $private_params = [
            'snlist' => '',
        ];
        $this->methodPrivateParams('allStatus', $private_params);
    }

    public function testSetVoice()
    {
        $private_params = [
            'sn' => '',
            'voiceType' => '',
        ];
        $this->methodPrivateParams('setVoice', $private_params);
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
}
