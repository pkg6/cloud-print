<?php

namespace Pkg6\CloudPrint\Poscom;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

trait ReqTrait
{
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
        $public_params = [
            'memberCode' => $this->config['memberCode'],
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        return $this->httpRequest($method, $url, [
            'form_params' => $params,
        ]);
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