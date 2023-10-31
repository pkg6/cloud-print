<?php

namespace Pkg6\cloudPrint\Tests;

use PHPUnit\Framework\TestCase;
use Pkg6\cloudPrint\Kernel\Cache\FileCache;

class CacheTest extends TestCase
{
    public function testSetGet()
    {
        $cache = new FileCache();
        $cache->set("t", "list");
        $v = $cache->get("t");
        $this->assertEquals("list", $v);
    }
}