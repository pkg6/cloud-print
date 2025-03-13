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

namespace Pkg6\CloudPrint\Tests;

use PHPUnit\Framework\TestCase;
use Pkg6\CloudPrint\Factory;

class BaseTest extends TestCase
{
    /**
     * @return void
     */
    public function testBase()
    {
        $this->assertEquals(1, 1);
    }

    /**
     * @return \Pkg6\CloudPrint\Feieyun\Client
     */
    public function Feieyun()
    {
        return Factory::Feieyun([
            'user' => 'dasdl',
            'ukey' => 'daskdlask',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Jolimark\Client
     */
    public function Jolimark()
    {
        return Factory::Jolimark([
            'app_id' => 'dasdas',
            'app_key' => 'fsjkdfklsadsadsa',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Kuaidi100\Client
     */
    public function Kuaidi100()
    {
        return Factory::Kuaidi100([
            'key' => 'daskdlaskd',
            'secret' => 'fdsjfjdsklfjks',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Poscom\Client
     */
    public function Poscom()
    {
        return Factory::Poscom([
            'memberCode' => 'fsklfkasld',
            'apiKey' => 'fjaksljfkalsjkjk',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Ushengyun\Client
     */
    public function Ushengyun()
    {
        return Factory::Ushengyun([
            'appId' => '10001',
            'appSecret' => '**********',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Xpyun\Client
     */
    public function Xpyun()
    {
        return Factory::Xpyun([
            'user' => 'fsjklfjklsdaf',
            'userKey' => 'fksdfklsdkflskdlf;',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Yilianyun\Client
     */
    public function Yilianyun()
    {
        return Factory::Yilianyun([
            'client_id' => 'fsdkalfjklsajdfk',
            'client_secret' => 'sdaksldjaskldjaskljkl',
        ]);
    }

    /**
     * @return \Pkg6\CloudPrint\Zhongwuyun\Client
     */
    public function Zhongwuyun()
    {
        return Factory::Zhongwuyun([
            'appid' => '******',
            'appsecret' => '******',
        ]);
    }
}
