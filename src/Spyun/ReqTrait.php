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

namespace Pkg6\CloudPrint\Spyun;

use Pkg6\CloudPrint\Traits\ReqBT;

trait ReqTrait
{
    use ReqBT;

    /**
     * @param string $method GET/POST/PUT/PATCH/DELETE
     * @param string $action 接口路径，例如 printer/print
     * @param array  $private_params
     *
     * @return string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $action, $private_params)
    {
        $params = array_merge([
            'appid' => $this->config['appid'],
            'timestamp' => time(),
        ], $private_params);
        $params = array_filter($params, fn ($v) => ! is_null($v) && $v !== '');
        $params['sign'] = $this->sign($params);

        $url = rtrim($this->getRequestUrl(), '/') . '/' . ltrim($action, '/');
        $method = strtoupper($method);
        $options = in_array($method, ['GET', 'DELETE'], true)
            ? ['query' => $params]
            : ['form_params' => $params];

        return $this->httpRequest($method, $url, $options);
    }

    /**
     * 签名生成算法：参数按参数名ASCII字典序排序后拼接，再追加appsecret进行MD5并转大写.
     *
     * @return string
     */
    protected function sign(array $params)
    {
        ksort($params);
        $string = '';
        foreach ($params as $key => $value) {
            if ($key === 'sign' || is_array($value) || is_null($value) || $value === '') {
                continue;
            }
            $string .= $key . '=' . $value . '&';
        }
        $string = rtrim($string, '&') . '&appsecret=' . $this->config['appsecret'];

        return strtoupper(md5($string));
    }
}
