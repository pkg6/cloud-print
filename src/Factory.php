<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint;

use InvalidArgumentException;

/**
 * Class Factory.
 *
 * @method static Feieyun\AppContainer Feieyun($config)
 * @method static Xpyun\AppContainer Xpyun($config)
 * @method static Kuaidi100\AppContainer Kuaidi100($config)
 * @method static Yilianyun\AppContainer Yilianyun($config)
 * @method static Jolimark\AppContainer Jolimark($config)
 * @method static Poscom\AppContainer Poscom($config)
 * @method static Printcenter\AppContainer Printcenter($config)
 * @method static Zhongwuyun\AppContainer Zhongwuyun($config)
 * @method static Ushengyun\AppContainer Ushengyun($config)
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
        $app = __NAMESPACE__ . '\\' . $name . '\\AppContainer';
        if ( ! class_exists($app)) {
            throw new InvalidArgumentException('class not exists:' . $app);
        }
        $instance = crc32($name . serialize($config));
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
        //        $config = (array_key_exists(0, $arguments) && is_array($arguments) ? $arguments[0] : []);
        return self::make($name, ...$arguments);
    }
}
