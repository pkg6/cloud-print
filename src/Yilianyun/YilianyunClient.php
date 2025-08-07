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

namespace Pkg6\cloudPrint\Yilianyun;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;
use Pkg6\cloudPrint\Kernel\Support\Timer;

/**
 * Class YilianyunClient.
 */
class YilianyunClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'https://open-api.10ss.net/';

    /**
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws Exception
     * @throws GuzzleException
     */
    public function request($action, $private_params)
    {
        $timestamp = Timer::timeStamp();
        $public_params = [
            'client_id' => $this->config['client_id'],
            'sign' => $this->sign($timestamp),
            'timestamp' => $timestamp,
            'id' => $this->uuid(),
        ];
        if ($action != 'oauth/oauth') {
            $public_params['access_token'] = $this->accessToken();
        }
        $url = $this->buildHost($action);
        $params = array_filter(array_merge($public_params, $private_params));
        $resp = $this->httpPost($url, $params);
        $this->requestLog('POST:' . $url, $params, $resp);

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
        $key = md5($this->config['client_id'] . $this->config['client_secret']);
        $access_token = $this->app->cache->getCache($key);
        if (!empty($access_token)) {
            return $access_token;
        }
        $params = [
            'grant_type' => 'client_credentials',
            'scope' => 'all',
        ];
        $resp = $this->request('oauth/oauth', $params);
        $data = json_decode($resp, true);
        if (empty($data['body']['access_token'])) {
            return $resp;
        }
        $this->app->cache->setCache($key, $data['body']['access_token'], $data['body']['expires_in']);
        return $data['body']['access_token'];
    }

    /**
     * @param $action
     *
     * @return string
     */
    protected function buildHost($action)
    {
        return ($this->config['host'] ?? $this->host) . $action;
    }

    /**
     * @param $timestamp
     *
     * @return string
     */
    protected function sign($timestamp)
    {
        return md5($this->config['client_id'] . $timestamp . $this->config['client_secret']);
    }

    /**
     * @return string
     */
    protected function uuid()
    {
        $chars = md5(uniqid(mt_rand(), true));

        return substr($chars, 0, 8) . '-'
            . substr($chars, 8, 4) . '-'
            . substr($chars, 12, 4) . '-'
            . substr($chars, 16, 4) . '-'
            . substr($chars, 20, 12);
    }
}
