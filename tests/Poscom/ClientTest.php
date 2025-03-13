<?php

namespace Pkg6\CloudPrint\Tests\Poscom;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
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


    public function testAddDev()
    {
        $private_params = [
            'deviceID' => '',
            'devName' => '',
            'grpID' => '',
            'mPhone' => '',
            'nPhone' => '',
            'cutting' => '',
        ];
        $this->methodPrivateParams('addDev', $private_params);
    }

    public function testEditDev()
    {
        $private_params = [
            'deviceID' => '',
            'devName' => '',
            'grpID' => '',
            'mPhone' => '',
            'nPhone' => '',
            'cutting' => '',
        ];
        $this->methodPrivateParams('editDev', $private_params);
    }

    public function testDelDev()
    {
        $private_params = [
            'deviceID' => '',
        ];
        $this->methodPrivateParams('delDev', $private_params);
    }

    public function testGetStatus()
    {
        $private_params = [
            'deviceID' => '',
        ];
        $this->methodPrivateParams('getStatus', $private_params);
    }


    public function testSendMsg()
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
        $this->methodPrivateParams('sendMsg', $private_params);
    }

    public function testQueryState()
    {
        $private_params = [
            'msgNo' => '',
        ];
        $this->methodPrivateParams('queryState', $private_params);
    }

    public function testSendVolume()
    {
        $private_params = [
            'deviceID' => '',
            'volume' => '',
        ];
        $this->methodPrivateParams('sendVolume', $private_params);
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

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Poscom();
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}