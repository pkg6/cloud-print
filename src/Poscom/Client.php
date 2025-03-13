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

namespace Pkg6\CloudPrint\Poscom;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;

/**
 * https://dev.poscom.cn.
 */
class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://api.poscom.cn/';

    protected $config = [
        'host' => "https://api.poscom.cn/",
        'memberCode' => "",
        'apiKey' => "",
    ];
    /**
     * 查询（打印机）分组列表.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function group($private_params)
    {
        return $this->request('GET', 'apisc/group', $private_params);
    }

    /**
     * 添加（打印机）分组.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function addGroup($private_params)
    {
        return $this->request('POST', 'apisc/addgroup', $private_params);
    }

    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function addDev($private_params)
    {
        return $this->request('POST', 'apisc/adddev', $private_params);
    }

    /**
     * 修改设备信息.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function editDev($private_params)
    {
        return $this->request('POST', 'apisc/editdev', $private_params);
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
    public function delDev($private_params)
    {
        return $this->request('POST', 'apisc/deldev', $private_params);
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
    public function getStatus($private_params)
    {
        return $this->request('POST', 'apisc/getStatus', $private_params);
    }

    /**
     * 模板列表.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function listTemplate($private_params)
    {
        return $this->request('POST', 'apisc/listTemplate', $private_params);
    }

    /**
     * 指定模板打印.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function templetPrint($private_params)
    {
        return $this->request('POST', 'apisc/templetPrint', $private_params);
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
    public function sendMsg($private_params)
    {
        return $this->request('POST', 'apisc/sendMsg', $private_params);
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
    public function queryState($private_params)
    {
        return $this->request('GET', 'apisc/queryState', $private_params);
    }

    /**
     * 接口列表-打印机音量设置.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function sendVolume($private_params)
    {
        return $this->request('POST', 'apisc/sendVolume', $private_params);
    }

    /**
     * 打印机切换播报类型.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function setVoiceType($private_params)
    {
        return $this->request('POST', 'apisc/setVoiceType', $private_params);
    }
}
