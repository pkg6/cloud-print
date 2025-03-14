<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * (L) Licensed <https://opensource.org/license/MIT>
 *
 * (A) zhiqiang <https://www.zhiqiang.wang>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\CloudPrint\Tests\Zhongwuyun;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testStatus()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
        ];
        $this->methodPrivateParams('status', $private_params);
    }

    public function testPrintStatus()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'dataid' => '123',
        ];
        $this->methodPrivateParams('printStatus', $private_params);
    }

    public function testEmptyPrintqueue()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
        ];
        $this->methodPrivateParams('emptyPrintqueue', $private_params);
    }

    public function testCancelOne()
    {
        $private_params = [
            'dataid' => '123',
        ];
        $this->methodPrivateParams('cancelOne', $private_params);
    }

    public function testSound()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'sound' => 3,
        ];
        $this->methodPrivateParams('sound', $private_params);
    }

    public function testVoice()
    {
        $private_params = [
            'deviceid' => '1111111',
            'devicesecret' => '11111111',
            'voice' => base64_encode('.mp3'),
        ];
        $this->methodPrivateParams('voice', $private_params);
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
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}
