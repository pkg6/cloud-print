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

namespace Pkg6\CloudPrint\Zhongwuyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'http://api.zhongwuyun.com';

    protected $config = [
        'host' => "http://api.zhongwuyun.com",
        'appid' => "",
        'appsecret' => "",
    ];

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function status($private_params)
    {
        return $this->request("GET", 'status', $private_params);
    }

    /**
     * 打印.
     *
     * @param $private_params
     *
     * @return mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function print($private_params)
    {
        return $this->request("POST", '', $private_params);
    }

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function emptyPrintqueue($private_params)
    {
        return $this->request("POST", 'emptyprintqueue', $private_params);
    }

    /**
     * 取消单条未打印订单.
     *
     * @param $private_params
     *
     * @return string
     *
     * @throws GuzzleException
     */
    public function cancelOne($private_params)
    {
        return $this->request("POST", 'cancelone', $private_params);
    }

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @return mixed
     *
     * @throws GuzzleException
     */
    public function printStatus($private_params)
    {
        return $this->request("POST", 'printstatus', $private_params, true);
    }

    /**
     * 设置音量.
     *
     * @param $private_params
     *
     * @return string
     *
     * @throws GuzzleException
     */
    public function sound($private_params)
    {
        return $this->request("POST", 'sound', $private_params);
    }

    /**
     * 设置语音（未上线）.
     *
     * @param $private_params
     *
     * @return string
     *
     * @throws GuzzleException
     */
    public function voice($private_params)
    {
        return $this->request("POST", 'voice', $private_params);
    }
}
