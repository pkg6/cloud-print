<?php

namespace Pkg6\CloudPrint\Xpyun;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

trait ReqTrait
{
    /**
     * @param $action
     * @param $private_params
     *
     * @return string
     * @throws Exception
     *
     * @throws GuzzleException
     */
    public function request($action, $private_params)
    {
        $timestamp = time();
        $public_params = [
            'user' => $this->config['user'],
            'timestamp' => $timestamp,
            'sign' => $this->getSign($timestamp),
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $url = $this->config['host'] ?? $this->host . '/' . $action;
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