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

namespace Pkg6\CloudPrint\Traits;

use Psr\SimpleCache\CacheInterface;

trait CacheTrait
{

    /**
     * @var CacheInterface|null
     */
    protected $cache = null;

    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * @return CacheInterface
     */
    protected function cache()
    {
        return $this->cache;
    }
}
