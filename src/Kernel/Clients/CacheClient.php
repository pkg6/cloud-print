<?php

namespace Pkg6\cloudPrint\Kernel\Clients;

use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Cache\FileCache;
use Psr\SimpleCache\CacheInterface;

class CacheClient extends BaseClient
{

    /**
     * @return CacheInterface
     *
     */
    private function store()
    {
        $config = $this->app->getConfig();
        if (isset($config["cache"])){
            if ($config["cache"] instanceof CacheInterface){
                return $config["cache"];
            }
            if (class_exists($config["cache"]['class'])) {
                $c = new $config["cache"]['class']($config["cache"]);
                if ($c instanceof CacheInterface) {
                    return $c;
                }
            }
        }
        return new FileCache();

    }

    /**
     * 设置缓存.
     * @param     $key
     * @param     $value
     * @return bool
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function setCache($key, $value, $ttl = null)
    {
       return $this->store()->set($key, $value, $ttl);
    }

    /**
     * 获取缓存.
     * @param $key
     * @return mixed
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getCache($key)
    {
       return $this->store()->get($key);
    }

    /**
     * 判断缓存是否存在.
     * @param $key
     * @return mixed
     */
    public function hasCache($key)
    {
        return $this->store()->has($key);
    }

    /**
     * 删除缓存.
     * @param $key
     * @return bool
     */
    public function deleteCache($key)
    {
        return $this->store()->delete($key);
    }

}