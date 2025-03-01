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

namespace Pkg6\cloudPrint\Poscom;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;

/**
 * Class PoscomClient.
 */
class PoscomClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'https://api.poscom.cn/';

    /**
     * @param $method
     * @param $action
     * @param $private_params
     *
     * @throws GuzzleException
     * @throws Exception
     *
     * @return string
     */
    public function request($method, $action, $private_params)
    {
        $url = $this->config['host'] ?? $this->host . $action;
        $reqTime = $this->time();
        $public_params = [
            'reqTime' => $reqTime,
            'securityCode' => $this->securityCode($reqTime),
            'memberCode' => $this->config['memberCode'],
        ];
        $params = array_filter(array_merge($public_params, $private_params));

        // 请求安全校验
        $securityStr = $params['memberCode'] .  $params['reqTime'] . $this->config['apiKey'];
        if(!empty($params['deviceID'])){
            $securityStr .= $params['deviceID'];
        }
        $params['securityCode'] = md5($securityStr);

        $resp = $this->httpRequest($method, $url, [
            'form_params' => $params,
        ]);
        $this->requestLog($method . ':' . $url, $params, $resp);

        return $resp;
    }

    /**
     * @param $reqTime
     *
     * @return string
     */
    public function securityCode($reqTime)
    {
        return md5($this->config['memberCode'] . $reqTime . $this->config['apiKey']);
    }

    /**
     * @return float
     */
    public function time()
    {
        return floor(microtime(true) * 1000);
    }
}
