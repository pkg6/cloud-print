<?php

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