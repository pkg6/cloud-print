<?php

namespace Pkg6\CloudPrint\Zhongwuyun;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

trait ReqTrait
{
    /**
     * @param $action
     * @param $private_params
     * @param bool $is_get
     *
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException
     */
    public function request($action, $private_params, $is_get = false)
    {
        $public_params = [
            'appid' => $this->config['appid'],
            'timestamp' => time(),
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $params['sign'] = $this->sign($params);
        $url = $this->config['host'] ?? $this->host . '/' . $action;
        if ($is_get) {
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