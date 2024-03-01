<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Kernel\Support;

/**
 * Class Timer.
 */
class Timer
{
    /**
     * @return int
     */
    public static function timeStamp()
    {
        return time();
    }
}
