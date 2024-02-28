<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Tests\Feieyun;

use Pkg6\cloudPrint\Feieyun\Printer;
use Pkg6\cloudPrint\Tests\BaseTest;

class PrinterTest extends BaseTest
{
    public function testRegister()
    {
        $private_params = ['printerContent' => '316500010 # abcdefgh # 快餐前台 # 13688889999'];
        $this->methodPrivateParams('register', $private_params);
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
            'phonenum' => '',
        ];
        $this->methodPrivateParams('update', $private_params);
    }

    public function testStatus()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('status', $private_params);
    }

    public function testLabelMsg()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'times' => 1,
            'img' => '',
        ];
        $this->methodPrivateParams('labelMsg', $private_params);
    }

    public function testMsg()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'times' => 1,
        ];
        $this->methodPrivateParams('msg', $private_params);
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

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Feieyun();
        $client = $this->mockApiClient(Printer::class, $app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}
