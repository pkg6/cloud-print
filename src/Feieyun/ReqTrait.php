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

namespace Pkg6\CloudPrint\Feieyun;

use Pkg6\CloudPrint\Traits\ReqBT;

trait ReqTrait
{
    use ReqBT;

    public function request($method, $action, $private_params)
    {
        $timestamp = time();
        $public_params = [
            'user' => $this->config['user'],
            'stime' => $timestamp,
            'sig' => $this->getSig($timestamp),
            'apiname' => $action,
        ];
        $url = $this->getRequestUrl();
        $params = array_filter(array_merge($public_params, $private_params));

        return $this->httpPost($url, $params);
    }

    protected function getSig($timestamp)
    {
        return sha1($this->config['user'] . $this->config['ukey'] . $timestamp);
    }
}
