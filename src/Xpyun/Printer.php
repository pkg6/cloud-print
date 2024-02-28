<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Xpyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\Interfaces\PrinterInterface;

/**
 * Class Printer.
 */
class Printer extends XpyunClient implements PrinterInterface
{
    /**
     * 添加打印机到开发者账户（可批量） 【必接】.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function register($private_params)
    {
        return $this->request('addPrinters', $private_params);
    }

    /**
     * 删除批量打印机.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function delete($private_params)
    {
        return $this->request('delPrinters', $private_params);
    }

    /**
     * 修改打印机信息.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function update($private_params)
    {
        return $this->request('updPrinter', $private_params);
    }

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function status($private_params)
    {
        return $this->request('queryPrinterStatus', $private_params);
    }

    /**
     * 打印.
     *
     * @param $private_params
     * @param $type
     *
     * @throws GuzzleException
     *
     * @return mixed|string
     */
    public function print($private_params, $type)
    {
        if ($type == 'label') {
            return $this->labelMsg($private_params);
        }

        return $this->msg($private_params);
    }

    /**
     * 打印订单，Open_printMsg.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function msg($private_params)
    {
        return $this->request('print', $private_params);
    }

    /**
     * 标签机打印订单，Open_printLabelMsg.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function labelMsg($private_params)
    {
        return $this->request('printLabel', $private_params);
    }

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function clean($private_params)
    {
        return $this->request('delPrinterQueue', $private_params);
    }

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function orderState($private_params)
    {
        return $this->request('queryOrderState', $private_params);
    }

    /**
     * 查询指定打印机某天的订单统计数.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function orderInfoByDate($private_params)
    {
        return $this->request('queryOrderStatis', $private_params);
    }

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function allStatus($private_params)
    {
        return $this->request('queryPrintersStatus', $private_params);
    }

    /**
     * 设置打印机语音类型.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function setVoice($private_params)
    {
        return $this->request('setVoiceType', $private_params);
    }

    /**
     * 金额播报.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function playVoice($private_params)
    {
        return $this->request('playVoice', $private_params);
    }
}
