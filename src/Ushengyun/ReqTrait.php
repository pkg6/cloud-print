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
