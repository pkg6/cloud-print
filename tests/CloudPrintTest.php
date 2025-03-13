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

class CloudPrintTest extends BaseTest
{
    public function testFeieyun()
    {
        $app = $this->newCloudPrint()->client("feieyun");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Feieyun\Client::class, $app);
    }

    public function testJolimark()
    {
        $app = $this->newCloudPrint()->client("jolimark");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Jolimark\Client::class, $app);
    }

    public function testKuaidi100()
    {
        $app = $this->newCloudPrint()->client("kuaidi100");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Kuaidi100\Client::class, $app);
    }

    public function testPoscom()
    {
        $app = $this->newCloudPrint()->client("poscom");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Poscom\Client::class, $app);
    }

    public function testUshengyun()
    {
        $app = $this->newCloudPrint()->client("ushengyun");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Ushengyun\Client::class, $app);
    }

    public function testXpyun()
    {
        $app = $this->newCloudPrint()->client("xpyun");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Xpyun\Client::class, $app);
    }

    public function testYilianyun()
    {
        $app = $this->newCloudPrint()->client("yilianyun");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Yilianyun\Client::class, $app);
    }

    public function testZhongwuyun()
    {
        $app = $this->newCloudPrint()->client("zhongwuyun");
        $this->assertInstanceOf(\Pkg6\cloudPrint\Zhongwuyun\Client::class, $app);
    }
}
