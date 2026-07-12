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

namespace Pkg6\CloudPrint\Xpyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;
use Pkg6\CloudPrint\Requests\PrintRequest;

class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'https://open.xpyun.net/api/openapi/xprinter';

    protected $config = [
        'host' => "https://open.xpyun.net/api/openapi/xprinter",
        "user" => "",
        "userKey" => "",
    ];
    /**
     * 添加打印机到开发者账户（可批量） 【必接】.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function addPrinters($private_params)
    {
        return $this->request("", 'addPrinters', $private_params);
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
    public function delPrinters($private_params)
    {
        return $this->request("", 'delPrinters', $private_params);
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
    public function updPrinter($private_params)
    {
        return $this->request("", 'updPrinter', $private_params);
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
    public function queryPrinterStatus($private_params)
    {
        return $this->request("", 'queryPrinterStatus', $private_params);
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
    public function print(PrintRequest $request): string
    {
        $params = $this->buildPrintParams($request);

        if ($request->getType() === 'label') {
            return $this->printLabel($params);
        }

        return $this->request("", 'print', $params);
    }

    protected function buildPrintParams(PrintRequest $request): array
    {
        $params = [
            'sn' => $request->getSn(),
            'content' => $request->getContent(),
        ];

        if ($request->getCopies() > 1) {
            $params['times'] = $request->getCopies();
        }

        if ($request->getOrderId()) {
            $params['orderid'] = $request->getOrderId();
        }

        if ($request->getExtra()) {
            $params = array_merge($params, $request->getExtra());
        }

        return array_filter($params, fn ($v) => ! is_null($v));
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
    public function printLabel($private_params)
    {
        return $this->request("", 'printLabel', $private_params);
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
    public function delPrinterQueue($private_params)
    {
        return $this->request("", 'delPrinterQueue', $private_params);
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
    public function queryOrderState($private_params)
    {
        return $this->request("", 'queryOrderState', $private_params);
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
    public function queryOrderStatis($private_params)
    {
        return $this->request("", 'queryOrderStatis', $private_params);
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
    public function queryPrintersStatus($private_params)
    {
        return $this->request("", 'queryPrintersStatus', $private_params);
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
    public function setVoiceType($private_params)
    {
        return $this->request("", 'setVoiceType', $private_params);
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
        return $this->request("", 'playVoice', $private_params);
    }
}
