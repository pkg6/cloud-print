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

namespace Pkg6\CloudPrint\Xpyun;

use Pkg6\CloudPrint\Traits\ReqBT;

trait ReqTrait
{
    use ReqBT;

    /**
     * @param $method
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $action, $private_params)
    {
        $timestamp = time();
        $public_params = [
            'user' => $this->config['user'],
            'timestamp' => $timestamp,
            'sign' => $this->getSign($timestamp),
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $url = $this->getRequestUrl() . '/' . $action;

        return $this->httpPostJson($url, $params);
    }

    /**
     * @param $timestamp
     *
     * @return string
     */
    protected function getSign($timestamp)
    {
        return sha1($this->config['user'] . $this->config['userKey'] . $timestamp);
    }
}
