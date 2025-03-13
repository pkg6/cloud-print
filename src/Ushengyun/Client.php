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

namespace Pkg6\CloudPrint\Ushengyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://open-api.ushengyun.com/printer';

    protected $config = [
        'host' => "https://open-api.ushengyun.com/printer",
        'appId' => "",
        'appSecret' => "",
    ];
    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function status($private_params)
    {
        return $this->request('status', $private_params);
    }

    /**
     * 打印.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function print($private_params)
    {
        return $this->request('print', $private_params);
    }
    /**
     * 清空待打印队列.
     *
     * @param $private_params
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
     * @return mixed
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
     * @return mixed
     */
    public function printStatus($private_params)
    {
        return $this->request('printstatus', $private_params);
    }

    /**
     * 设置设备音量.
     *
     * @param $private_params
     *
     * @return string
     */
    public function sound($private_params)
    {
        return $this->request('sound', $private_params);
    }

    /**
     * @param $private_params
     *
     * @return bool|string
     */
    public function logo($private_params)
    {
        return $this->request('logo', $private_params);
    }
}
