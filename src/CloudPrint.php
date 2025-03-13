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

namespace Pkg6\CloudPrint;

use InvalidArgumentException;
use Pkg6\CloudPrint\Contracts\ClientInterface;

class CloudPrint
{
    /**
     * @var string[]
     */
    protected $clientTable = [
        'feieyun' => Feieyun\Client::class,
        'jolimark' => Jolimark\Client::class,
        'kuaidi100' => Kuaidi100\Client::class,
        'poscom' => Poscom\Client::class,
        'ushengyun' => Ushengyun\Client::class,
        'xpyun' => Xpyun\Client::class,
        'yilianyun' => Yilianyun\Client::class,
        'zhongwuyun' => Zhongwuyun\Client::class,
    ];

    /**
     * @var array
     */
    protected $clients = [];

    /**
     * @var array
     */
    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * @param $name
     *
     * @return \Pkg6\CloudPrint\Contracts\ClientInterface
     */
    public function client($name = "")
    {
        $name = $name ?: $this->getDefaultDriver();
        if (is_null($name)) {
            throw new InvalidArgumentException(sprintf('Unable to resolve NULL client for [%s].', static::class));
        }

        return $this->clients[$name] = $this->getClient($name);
    }

    /**
     * 获取客户端实例.
     *
     * @param string $name
     *
     * @return \Pkg6\CloudPrint\Contracts\ClientInterface
     */
    protected function getClient($name)
    {
        return $this->drivers[$name] ?? $this->createClient($name);
    }

    /**
     * 加载自定义客户端.
     *
     * @param $name
     * @param \Pkg6\CloudPrint\Contracts\ClientInterface $client
     *
     * @return $this
     */
    public function extend($name, ClientInterface $client)
    {
        $this->clients[$name] = $client;

        return $this;
    }

    /**
     * 创建驱动.
     *
     * @param string $name
     *
     * @return \Pkg6\CloudPrint\Contracts\ClientInterface
     */
    protected function createClient($name)
    {
        $type = $this->resolveType($name);
        $config = $this->resolveConfig($name);
        $class = $this->resolveClass($type);

        return new $class($config);
    }

    /**
     * @param $name
     *
     * @return string
     */
    protected function resolveType($name)
    {
        return $this->config['clients'][$name]['type'];
    }

    /**
     * @param $type
     *
     * @return string
     */
    public function resolveClass($type)
    {
        if (class_exists($type)) {
            return $type;
        }
        if ($this->clientTable[$type]) {
            return $this->clientTable[$type];
        }
        throw new InvalidArgumentException("client [$type] not supported.");
    }

    /**
     * @param $type
     *
     * @return mixed
     */
    public function resolveConfig($type)
    {
        return $this->config['clients'][$type];
    }

    /**
     * 默认驱动.
     *
     * @return string|null
     */
    public function getDefaultDriver()
    {
        return $this->config['default'];
    }

    public function __call(string $name, array $arguments)
    {
        return $this->client()->$name(...$arguments);
    }
}
