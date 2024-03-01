<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Tests\Poscom;

use Pkg6\cloudPrint\Poscom\Printer;
use Pkg6\cloudPrint\Tests\BaseTest;

class PrinterTest extends BaseTest
{
    public function testGroup()
    {
        $private_params = [
        ];
        $this->methodPrivateParams('group', $private_params);
    }

    public function testAddGroup()
    {
        $private_params = [
            'grpName' => '',
        ];
        $this->methodPrivateParams('addGroup', $private_params);
    }

    //    public function testupdateGroup()
    //    {
    //        $private_params = [
    //            'grpID'   => '',
    //            'grpName' => '',
    //        ];
    //        $this->methodPrivateParams('updateGroup', $private_params);
    //    }

    //    public function testdelGroup()
    //    {
    //        $private_params = [
    //            'grpID'   => '',
    //            'grpName' => '',
    //        ];
    //        $this->methodPrivateParams('delGroup', $private_params);
    //    }

    public function testRegister()
    {
        $private_params = [
            'deviceID' => '',
            'devName' => '',
            'grpID' => '',
            'mPhone' => '',
            'nPhone' => '',
            'cutting' => '',
        ];
        $this->methodPrivateParams('register', $private_params);
    }

    public function testUpdate()
    {
        $private_params = [
            'deviceID' => '',
            'devName' => '',
            'grpID' => '',
            'mPhone' => '',
            'nPhone' => '',
            'cutting' => '',
        ];
        $this->methodPrivateParams('update', $private_params);
    }

    public function testDelete()
    {
        $private_params = [
            'deviceID' => '',
        ];
        $this->methodPrivateParams('delete', $private_params);
    }

    public function testStatus()
    {
        $private_params = [
            'deviceID' => '',
        ];
        $this->methodPrivateParams('status', $private_params);
    }

    //    public function testclean()
    //    {
    //        $private_params = [
    //            'deviceID' => '',
    //            'all'      => '',
    //        ];
    //        $this->methodPrivateParams('clean', $private_params);
    //    }

    public function testPrint()
    {
        $private_params = [
            'charset' => '',
            'deviceID' => '',
            'msgDetail' => '',
            'msgNo' => '',
            'reprint' => '',
            'multi' => '',
            'mode' => '',
            'times' => '',
            'voice' => '',
        ];
        $this->methodPrivateParams('print', $private_params);
    }

    public function testOrderState()
    {
        $private_params = [
            'msgNo' => '',
        ];
        $this->methodPrivateParams('orderState', $private_params);
    }

    public function testSetVoice()
    {
        $private_params = [
            'deviceID' => '',
            'volume' => '',
        ];
        $this->methodPrivateParams('setVoice', $private_params);
    }

    public function testSetVoiceType()
    {
        $private_params = [
            'deviceID' => '',
            'voiceType' => '',
        ];
        $this->methodPrivateParams('setVoiceType', $private_params);
    }

    public function testListTemplate()
    {
        $private_params = [

        ];
        $this->methodPrivateParams('listTemplate', $private_params);
    }

    //    public function testsetTempletPrint()
    //    {
    //        $private_params = [
    //            'deviceID'  => '',
    //            'templetID' => '',
    //            'tData'     => '',
    //            'charset'   => '',
    //            'msgNo'     => '',
    //            'reprint'   => '',
    //            'multi'     => '',
    //        ];
    //        $this->methodPrivateParams('setTempletPrint', $private_params);
    //    }

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Poscom();
        $client = $this->mockApiClient(Printer::class, $app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}
