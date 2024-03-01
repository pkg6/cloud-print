<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Tests\Zhongwuyun;

use Pkg6\cloudPrint\Tests\BaseTest;
use Pkg6\cloudPrint\Zhongwuyun\Printer;

class PrinterTest extends BaseTest
{
    public function testStatus()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
        ];
        $this->methodPrivateParams('status', $private_params);
    }

    public function testOrderState()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'dataid' => '123',
        ];
        $this->methodPrivateParams('orderState', $private_params);
    }

    public function testClean()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
        ];
        $this->methodPrivateParams('clean', $private_params);
    }

    public function testCleanOne()
    {
        $private_params = [
            'dataid' => '123',
        ];
        $this->methodPrivateParams('cleanOne', $private_params);
    }

    public function testSetSound()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'sound' => 3,
        ];
        $this->methodPrivateParams('setSound', $private_params);
    }

    public function testSetVoice()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'voice' => base64_encode('.mp3'),
        ];
        $this->methodPrivateParams('setVoice', $private_params);
    }

    public function testPrint()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'printdata' => '',
        ];
        $this->methodPrivateParams('print', $private_params);
    }

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Zhongwuyun();
        $client = $this->mockApiClient(Printer::class, $app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}
