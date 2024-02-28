<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Yilianyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\Interfaces\PrinterInterface;

/**
 * Class Printer.
 */
class Printer extends YilianyunClient implements PrinterInterface
{
    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function register($private_params)
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
    public function delete($private_params)
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
    public function status($private_params)
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
    public function restart($private_params)
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
     * 打印.
     *
     * @param $private_params
     * @param $type
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function print($private_params, $type)
    {
        if ($type == 'pic') {
            return $this->picPrint($private_params);
        }
        if ($type == 'express') {
            return $this->expressPrint($private_params);
        }

        return $this->textPrint($private_params);
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
    public function textPrint($private_params)
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
    public function picPrint($private_params)
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
    public function clean($private_params)
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
    public function cleanAll($private_params)
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
    public function orderState($private_params)
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
    public function orderList($private_params)
    {
        return $this->request('printer/getorderpaginglist', $private_params);
    }
}
