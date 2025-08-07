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

namespace Pkg6\cloudPrint\Jolimark;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Support\Timer;

/**
 * Class JolimarkClient.
 */
class JolimarkClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'http://mcp.jolimark.com/';
    /**
     * @var string
     */
    protected $signType = 'MD5';

    /**
     * @param $method
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException
     */
    public function request($method, $action, $private_params)
    {
        $url = ($this->config['host'] ?? $this->host) . $action;
        $public_params = [
            'app_id' => $this->config['app_id'],
        ];
        if ($action != 'mcp/v2/sys/GetAccessToken') {
            $private_params['access_token'] = $this->accessToken();
        }
        $params = array_filter(array_merge($public_params, $private_params));

        $resp = $this->httpRequest($method, $url, [
            'form_params' => $params,
        ]);
        $this->requestLog($method . ':' . $url, $params, $resp);

        return $resp;
    }

    /**
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException
     */
    protected function accessToken()
    {

        $key = md5($this->config['app_id'] . $this->config['app_key']);
        if ($this->app->cache->hasCache($key)) {
            return $this->app->cache->getCache($key);
        }
        $time = Timer::timeStamp();
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
        $this->app->cache->setCache($key, $data['return_data']['access_token'], $data['return_data']['expires_in']);

        return $data['return_data']['access_token'];
    }

    /**
     * @param $timestamp
     *
     * @return string
     */
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
