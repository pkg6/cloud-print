<?php

namespace Pkg6\CloudPrint\Feieyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'http://api.feieyun.cn/Api/Open/';

    protected $config = [
        'user' => "",
        'ukey' => "",
        'host' => "http://api.feieyun.cn/Api/Open/",
    ];

    /**
     * 批量添加打印机 Open_printerAddlist.
     *
     * @param $private_params
     *
     * @return string
     *
     */
    public function openRrinterAddlist($private_params)
    {
        return $this->request('Open_printerAddlist', $private_params);
    }
    /**
     * 删除批量打印机，Open_printerDelList.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openPrinterDelList($private_params)
    {
        return $this->request('Open_printerDelList', $private_params);
    }
    /**
     * 修改打印机信息，Open_printerEdit.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openPrinterEdit($private_params)
    {
        return $this->request('Open_printerEdit', $private_params);
    }
    /**
     * 获取某台打印机状态，Open_queryPrinterStatus.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openQueryPrinterStatus($private_params)
    {
        return $this->request('Open_queryPrinterStatus', $private_params);
    }
    public function print($private_params, $type)
    {
        if ($type == 'label') {
            return $this->openPrintLabelMsg($private_params);
        }
        return $this->openPrintMsg($private_params);
    }
    /**
     * 打印订单，Open_printMsg.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openPrintMsg($private_params)
    {
        return $this->request('Open_printMsg', $private_params);
    }
    /**
     * 标签机打印订单，Open_printLabelMsg.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openPrintLabelMsg($private_params)
    {
        return $this->request('Open_printLabelMsg', $private_params);
    }

    /**
     * 清空待打印队列，Open_delPrinterSqs.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openDelPrinterSqs($private_params)
    {
        return $this->request('Open_delPrinterSqs', $private_params);
    }
    /**
     * 查询订单是否打印成功，Open_queryOrderState.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openQueryOrderState($private_params)
    {
        return $this->request('Open_queryOrderState', $private_params);
    }

    /**
     * 查询指定打印机某天的订单统计数，Open_queryOrderInfoByDate.
     *
     * @param $private_params
     *
     *
     * @return string
     */
    public function openQueryOrderInfoByDate($private_params)
    {
        return $this->request('Open_queryOrderInfoByDate', $private_params);
    }
}