<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Tests;

use Mockery;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;
use Pkg6\cloudPrint\Factory;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Zhongwuyun\AppContainer;

class BaseTest extends TestCase
{
    public function testBase()
    {
        $this->assertEquals(1, 1);
    }

    /**
     * @param $name
     * @param $app
     *
     * @return Mock
     */
    public function mockApiClient($name, $app)
    {
        BaseClient::$request_log = true;
        $client = Mockery::mock($name, [$app])->makePartial();

        return $client;
    }

    /**
     * @return \Pkg6\cloudPrint\Feieyun\AppContainer
     */
    public function Feieyun()
    {
        return Factory::Feieyun([
            'user' => 'dasdl',
            'ukey' => 'daskdlask',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Jolimark\AppContainer
     */
    public function Jolimark()
    {
        return Factory::Jolimark([
            'app_id' => 'dasdas',
            'app_key' => 'fsjkdfklsadsadsa',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Kuaidi100\AppContainer
     */
    public function Kuaidi100()
    {
        return Factory::Kuaidi100([
            'key' => 'daskdlaskd',
            'secret' => 'fdsjfjdsklfjks',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Poscom\AppContainer
     */
    public function Poscom()
    {
        return Factory::Poscom([
            'memberCode' => 'fsklfkasld',
            'apiKey' => 'fjaksljfkalsjkjk',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Printcenter\AppContainer
     */
    public function Printcenter()
    {
        return Factory::Printcenter([
            'key' => 'fasjkldjaskl',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Ushengyun\AppContainer
     */
    public function Ushengyun()
    {
        return Factory::Ushengyun([
            'appId' => '10001',
            'appSecret' => '**********',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Xpyun\AppContainer
     */
    public function Xpyun()
    {
        return Factory::Xpyun([
            'user' => 'fsjklfjklsdaf',
            'userKey' => 'fksdfklsdkflskdlf;',
        ]);
    }

    /**
     * @return \Pkg6\cloudPrint\Yilianyun\AppContainer
     */
    public function Yilianyun()
    {
        return Factory::Yilianyun([
            'client_id' => 'fsdkalfjklsajdfk',
            'client_secret' => 'sdaksldjaskldjaskljkl',
        ]);
    }

    /**
     * @return AppContainer
     */
    public function Zhongwuyun()
    {
        return Factory::Zhongwuyun([
            'appid' => '******',
            'appsecret' => '******',
        ]);
    }
}
