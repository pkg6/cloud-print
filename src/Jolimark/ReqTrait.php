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

namespace Pkg6\CloudPrint\Jolimark;

use Exception;
use GuzzleHttp\Exception\GuzzleException;

trait ReqTrait
{
    /**
     * @param $method
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     */
    public function request($method, $action, $private_params)
    {
        $url = $this->config['host'] ?? $this->host . $action;
        $public_params = [
            'app_id' => $this->config['app_id'],
        ];
        if ($action != 'mcp/v2/sys/GetAccessToken') {
            $private_params['access_token'] = $this->accessToken();
        }
        $params = array_filter(array_merge($public_params, $private_params));

        return $this->httpRequest($method, $url, [
            'form_params' => $params,
        ]);
    }

    /**
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function accessToken()
    {
        $key = md5($this->config['app_id'] . $this->config['app_key']);
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }
        $time = time();
        $params = [
            'time_stamp' => $time,
            'sign' => $this->sign($time),
            'sign_type' => 'MD5',
        ];
        $resp = $this->request('GET', 'mcp/v2/sys/GetAccessToken', $params);
        $data = json_decode($resp, true);
        if (empty($data['return_data']['access_token'])) {
            return $resp;
        }
        $this->cache->set($key, $data['return_data']['access_token'], $data['return_data']['expires_in']);

        return $data['return_data']['access_token'];
    }

    protected function sign($timestamp)
    {
        $str = http_build_query([
            'app_id' => $this->config['app_id'],
            'sign_type' => $this->signType,
            'time_stamp' => $timestamp,
            'key' => $this->config['app_key'],
        ]);

        return strtoupper(md5($str));
    }
}
