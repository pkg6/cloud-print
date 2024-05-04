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

namespace Pkg6\cloudPrint\Kernel\Interfaces;

/**
 * Interface PrinterInterface.
 */
interface PrinterInterface
{
    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function register($private_params);

    /**
     * 删除打印机.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function delete($private_params);

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function status($private_params);

    /**
     * 打印.
     *
     * @param $private_params
     * @param $type
     *
     * @return mixed
     */
    public function print($private_params, $type);

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function clean($private_params);

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function orderState($private_params);
}
