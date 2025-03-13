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

namespace Pkg6\CloudPrint\Kuaidi100;

trait ReqTrait
{
    protected $_requestUrl;

    public function setRequestUrl($requestUrl)
    {
        $this->_requestUrl = $requestUrl;

        return $this;
    }

    /**
     * @param $action
     * @param $private_params
     *
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($action, $private_params)
    {
        $timestamp = time();
        $params = [
            'method' => $action,
            'key' => $this->config['key'],
            'sign' => $this->sign($private_params, $timestamp),
            't' => $timestamp,
            'param' => json_encode($private_params),
        ];
        if ($action == 'imgOrder') {
            return $this->httpGet($this->_requestUrl, $params, ['Content-Type' => 'multipart/form-data']);
        } else {
            return $this->httpPost($this->_requestUrl, $params);
        }
    }
    protected function sign($param, $t)
    {
        return strtoupper(md5(json_encode($param) . $t . $this->config['key'] . $this->config['secret']));
    }
}
