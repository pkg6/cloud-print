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

use Pkg6\CloudPrint\Contracts\ClientInterface;
use Pkg6\CloudPrint\Traits\CacheTrait;
use Pkg6\CloudPrint\Traits\HttpClientTrait;

abstract class BaseClient implements ClientInterface
{
    use HttpClientTrait,CacheTrait;

    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}
