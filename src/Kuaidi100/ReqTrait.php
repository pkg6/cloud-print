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

namespace Pkg6\CloudPrint\Kuaidi100;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

trait ReqTrait
{
    /**
     * @param $url
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException
     */
    public function request($url, $action, $private_params)
    {
        $timestamp = time();
        $params = [
            'method' => $action,
            'key' => $this->config['key'],
            'sign' => $this->sign($private_params, $timestamp),
            't' => $timestamp,
            'param' => json_encode($private_params),
        ];
        if ($action == 'imgOrder') {
            return $this->httpGet($url, $params, ['Content-Type' => 'multipart/form-data']);
        } else {
            return $this->httpPost($url, $params);
        }
    }
    protected function sign($param, $t)
    {
        return strtoupper(md5(json_encode($param) . $t . $this->config['key'] . $this->config['secret']));
    }
}
