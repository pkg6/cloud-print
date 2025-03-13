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

/**
 * Class Factory.
 *
 * @method static Feieyun\Client Feieyun($config)
 * @method static Xpyun\Client Xpyun($config)
 * @method static Kuaidi100\Client Kuaidi100($config)
 * @method static Yilianyun\Client Yilianyun($config)
 * @method static Jolimark\Client Jolimark($config)
 * @method static Poscom\Client Poscom($config)
 * @method static Zhongwuyun\Client Zhongwuyun($config)
 * @method static Ushengyun\Client Ushengyun($config)
 */
class Factory
{
    /**
     * @var array
     */
    protected static $instances = [];

    /**
     * @param $name
     * @param array $config
     *
     * @return mixed
     */
    protected static function make($name, array $config)
    {
        $app = __NAMESPACE__ . '\\' . $name . '\\Client';
        if ( ! class_exists($app)) {
            throw new InvalidArgumentException('class not exists:' . $app);
        }
        $instance = crc32($name . md5(json_encode($config)));
        if ( ! isset(self::$instances[$instance])) {
            self::$instances[$instance] = new $app($config);
        }

        return self::$instances[$instance];
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
