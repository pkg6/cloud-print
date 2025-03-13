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

class FactoryTest extends BaseTest
{
    public function testFeieyun()
    {
        $app = $this->Feieyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Feieyun\Client::class, $app);
    }

    public function testJolimark()
    {
        $app = $this->Jolimark();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Jolimark\Client::class, $app);
    }

    public function testKuaidi100()
    {
        $app = $this->Kuaidi100();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Kuaidi100\Client::class, $app);
    }

    public function testPoscom()
    {
        $app = $this->Poscom();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Poscom\Client::class, $app);
    }

    public function testUshengyun()
    {
        $app = $this->Ushengyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Ushengyun\Client::class, $app);
    }

    public function testXpyun()
    {
        $app = $this->Xpyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Xpyun\Client::class, $app);
    }

    public function testYilianyun()
    {
        $app = $this->Yilianyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Yilianyun\Client::class, $app);
    }

    public function testZhongwuyun()
    {
        $app = $this->Zhongwuyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Zhongwuyun\Client::class, $app);
    }
}
