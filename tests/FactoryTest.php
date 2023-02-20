<?php

namespace Pkg6\cloudPrint\Tests;

use Pkg6\cloudPrint\Zhongwuyun\AppContainer;
use Pkg6\cloudPrint\Zhongwuyun\Printer;


class FactoryTest extends BaseTest
{
    public function testFeieyun()
    {
        $app = $this->Feieyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Feieyun\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Feieyun\Printer::class, $printer);
    }

    public function testJolimark()
    {
        $app = $this->Jolimark();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Jolimark\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Jolimark\Printer::class, $printer);
    }

    public function testKuaidi100()
    {
        $app = $this->Kuaidi100();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Kuaidi100\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Kuaidi100\Printer::class, $printer);
    }

    public function testPoscom()
    {
        $app = $this->Poscom();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Poscom\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Poscom\Printer::class, $printer);
    }

    public function testPrintcenter()
    {
        $app = $this->Printcenter();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Printcenter\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Printcenter\Printer::class, $printer);
    }

    public function testUshengyun()
    {
        $app = $this->Ushengyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Ushengyun\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Ushengyun\Printer::class, $printer);
    }

    public function testXpyun()
    {
        $app = $this->Xpyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Xpyun\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Xpyun\Printer::class, $printer);
    }

    public function testYilianyun()
    {
        $app = $this->Yilianyun();
        $this->assertInstanceOf(\Pkg6\cloudPrint\Yilianyun\AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(\Pkg6\cloudPrint\Yilianyun\Printer::class, $printer);
    }

    public function testZhongwuyun()
    {
        $app = $this->Zhongwuyun();
        $this->assertInstanceOf(AppContainer::class, $app);
        $printer = $app->printer;
        $this->assertInstanceOf(Printer::class, $printer);
    }
}
