<?php

namespace Pkg6\cloudPrint\Zhongwuyun;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Support\Timer;

/**
 * Class ZhongwuyunClient.
 */
class ZhongwuyunClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'http://api.zhongwuyun.com';

    /**
     * @param $action
     * @param $private_params
     * @param bool $is_get
     *
     * @return string
     * @throws Exception
     *
     * @throws GuzzleException
     */
    public function request($action, $private_params, $is_get = false)
    {
        $public_params  = [
            'appid'     => $this->config['appid'],
            'timestamp' => Timer::timeStamp(),
        ];
        $params         = array_filter(array_merge($public_params, $private_params));
        $params['sign'] = $this->sign($params);
        $url            = $this->config['host'] ?? $this->host . '/' . $action;
        if ($is_get) {
            $methed = 'GET';
            $resp   = $this->httpGet($url, $params);
        } else {
            $methed = 'POST';
            $resp   = $this->httpPost($url, $params);
        }
        $this->requestLog($methed . ':' . $url, $params, $resp);
        return $resp;
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
