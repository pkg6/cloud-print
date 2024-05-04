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

namespace Pkg6\cloudPrint\Kuaidi100;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Support\Timer;

/**
 * Class Kuaidi100Client.
 */
class Kuaidi100Client extends BaseClient
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
        $timestamp = Timer::timeStamp();
        $params = [
            'method' => $action,
            'key' => $this->config['key'],
            'sign' => $this->sign($private_params, $timestamp),
            't' => $timestamp,
            'param' => json_encode($private_params),
        ];
        if ($action == 'imgOrder') {
            $methed = 'GET';
            $resp = $this->httpGet($url, $params, ['Content-Type' => 'multipart/form-data']);
        } else {
            $methed = 'POST';
            $resp = $this->httpPost($url, $params);
        }
        $this->requestLog($methed . ':' . $url, $params, $resp);

        return $resp;
    }

    /**
     * @param $param
     * @param $t
     *
     * @return string
     */
    protected function sign($param, $t)
    {
        return strtoupper(md5(json_encode($param) . $t . $this->config['key'] . $this->config['secret']));
    }
}
