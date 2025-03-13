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
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function status($private_params)
    {
        return $this->request('status', $private_params, true);
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
        return $this->request('', $private_params);
    }

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function emptyPrintqueue($private_params)
    {
        return $this->request('emptyprintqueue', $private_params);
    }

    /**
     * 取消单条未打印订单.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function cancelOne($private_params)
    {
        return $this->request('cancelone', $private_params);
    }

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function printStatus($private_params)
    {
        return $this->request('printstatus', $private_params, true);
    }

    /**
     * 设置音量.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function sound($private_params)
    {
        return $this->request('sound', $private_params);
    }

    /**
     * 设置语音（未上线）.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function voice($private_params)
    {
        return $this->request('voice', $private_params);
    }
}
