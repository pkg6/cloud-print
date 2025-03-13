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

namespace Pkg6\CloudPrint\Zhongwuyun;

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
        $public_params = [
            'appid' => $this->config['appid'],
            'timestamp' => time(),
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $params['sign'] = $this->sign($params);
        $url = $this->getRequestUrl() . '/' . $action;
        if ($method == "get" || $method == "GET") {
            return $this->httpGet($url, $params);
        } else {
            return $this->httpPost($url, $params);
        }
    }

    /**
     * @param $params
     *
     * @return string
     */
    protected function sign($params)
    {
        $str = '';
        ksort($params);
        foreach ($params as $k => $v) {
            $str .= $k . $v;
        }
        $str .= $this->config['appsecret'];

        return md5($str);
    }
}
