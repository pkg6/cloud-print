<?php

namespace Pkg6\CloudPrint\Ushengyun;

trait ReqTrait
{
    public function request($action, $private_params)
    {
        $time = time();
        $public_params = [
            'appid' => $this->config['appId'],
            'timestamp' => $time,
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $params['sign'] = $this->sign($params);
        $url = $this->config['host'] ?? $this->host . '/' . $action;
        return $this->httpPostJson($url, $params);
    }

    /**
     * 签名.
     *
     * @param array $params
     *
     * @return string
     */
    protected function sign(array $params)
    {
        $stringToSigned = '';
        ksort($params);
        foreach ($params as $k => $v) {
            if (strlen($v) > 0) {
                $stringToSigned .= $k . $v;
            }
        }
        $stringToSigned .= $this->config['appSecret'];

        return md5($stringToSigned);
    }
}