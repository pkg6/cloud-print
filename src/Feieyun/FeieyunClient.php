<?php

namespace Pkg6\cloudPrint\Feieyun;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Support\Timer;

/**
 * Class FeieyunClient.
 */
class FeieyunClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'http://api.feieyun.cn/Api/Open/';

    /**
     * @param $action
     * @param array $private_params
     *
     * @return string
     * @throws Exception
     *
     * @throws GuzzleException
     */
    public function request($action, array $private_params = [])
    {
        $timestamp     = Timer::timeStamp();
        $public_params = [
            'user'    => $this->config['user'],
            'stime'   => $timestamp,
            'sig'     => $this->getSig($timestamp),
            'apiname' => $action,
        ];
        $url           = $this->config['host'] ?? $this->host;
        $params        = array_filter(array_merge($public_params, $private_params));
        $resp          = $this->httpPost($url, $params);
        $this->requestLog('POST:' . $url, $params, $resp);
        return $resp;
    }

    /**
     * @param $timestamp
     *
     * @return string
     * @throws Exception
     *
     */
    protected function getSig($timestamp)
    {
        return sha1($this->config['user'] . $this->config['ukey'] . $timestamp);
    }
}
