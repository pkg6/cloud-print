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

namespace Pkg6\CloudPrint\Tests\Feieyun;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testOpenRrinterAddlist()
    {
        $private_params = ['printerContent' => '316500010 # abcdefgh # 快餐前台 # 13688889999'];
        $this->methodPrivateParams('openRrinterAddlist', $private_params);
    }

    public function testDelete()
    {
        $private_params = [
            'snlist' => '',
        ];
        $this->methodPrivateParams('openPrinterDelList', $private_params);
    }

    public function testUpdate()
    {
        $private_params = [
            'sn' => '',
            'name' => '',
            'phonenum' => '',
        ];
        $this->methodPrivateParams('openPrinterEdit', $private_params);
    }

    public function testStatus()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('openQueryPrinterStatus', $private_params);
    }

    public function testLabelMsg()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'times' => 1,
            'img' => '',
        ];
        $this->methodPrivateParams('openPrintMsg', $private_params);
    }

    public function testMsg()
    {
        $private_params = [
            'sn' => '',
            'content' => '',
            'times' => 1,
        ];
        $this->methodPrivateParams('openPrintLabelMsg', $private_params);
    }

    public function testClean()
    {
        $private_params = [
            'sn' => '',
        ];
        $this->methodPrivateParams('openDelPrinterSqs', $private_params);
    }

    public function testOrderState()
    {
        $private_params = [
            'orderid' => '',
        ];
        $this->methodPrivateParams('openQueryOrderState', $private_params);
    }

    public function testOrderInfoByDate()
    {
        $private_params = [
            'sn' => '',
            'date' => '',
        ];
        $this->methodPrivateParams('openQueryOrderInfoByDate', $private_params);
    }

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Feieyun();
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}
