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

namespace Pkg6\CloudPrint\Yilianyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://open-api.10ss.net/';

    protected $config = [
        'host' => "https://open-api.10ss.net/",
        'client_id' => "",
        'client_secret' => "",
    ];

    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function addPrinter($private_params)
    {
        return $this->request('printer/addprinter', $private_params);
    }

    /**
     * 删除打印机.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function deletePrinter($private_params)
    {
        return $this->request('printer/deleteprinter', $private_params);
    }

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function getPrintStatus($private_params)
    {
        return $this->request('printer/getprintstatus', $private_params);
    }

    /**
     * 关机重启接口.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function shutdownreStart($private_params)
    {
        return $this->request('printer/shutdownrestart', $private_params);
    }

    /**
     * 声音调节接口.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function setSound($private_params)
    {
        return $this->request('printer/setsound', $private_params);
    }

    /**
     * 设置内置语音接口.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function setVoice($private_params)
    {
        return $this->request('printer/setvoice', $private_params);
    }

    /**
     * 删除内置语音接口.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function deleteVoice($private_params)
    {
        return $this->request('printer/deletevoice', $private_params);
    }

    /**
     * 文本打印.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function print($private_params)
    {
        return $this->request('print/index', $private_params);
    }

    /**
     * 图形打印.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function picturePrint($private_params)
    {
        return $this->request('pictureprint/index', $private_params);
    }

    /**
     * 面单打印.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function expressPrint($private_params)
    {
        return $this->request('expressprint/index', $private_params);
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
    public function cancelOne($private_params)
    {
        return $this->request('printer/cancelone', $private_params);
    }

    /**
     * 取消所有未打印订单.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function cancelAll($private_params)
    {
        return $this->request('printer/cancelall', $private_params);
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
    public function getOrderStatus($private_params)
    {
        return $this->request('printer/getorderstatus', $private_params);
    }

    /**
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getOrderpagingList($private_params)
    {
        return $this->request('printer/getorderpaginglist', $private_params);
    }
}
