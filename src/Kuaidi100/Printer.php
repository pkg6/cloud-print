<?php

namespace Pkg6\cloudPrint\Kuaidi100;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\Interfaces\PrinterInterface;

/**
 * Class Printer.
 */
class Printer extends Kuaidi100Client implements PrinterInterface
{
    /**
     * @var string
     */
    protected $printtask_host = 'https://poll.kuaidi100.com/printapi/printtask.do';

    /**
     * @var string
     */
    protected $eorderapi_host = 'http://poll.kuaidi100.com/eorderapi.do';

    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function register($private_params)
    {
        // TODO: Implement register() method.
    }

    /**
     * 删除打印机.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function delete($private_params)
    {
        // TODO: Implement delete() method.
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
        return $this->request($this->printtask_host, 'devstatus', $private_params);
    }

    /**
     * 打印.
     *
     * @param $private_params
     * @param $type
     *
     * @return mixed
     */
    public function print($private_params, $type)
    {
        // TODO: Implement print() method.
    }

    /**
     * 电子面单打印接口
     * https://api.kuaidi100.com/document/5f0ff6adbc8da837cbd8aef8.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function orderPrint($private_params)
    {
        return $this->request($this->printtask_host, 'eOrder', $private_params);
    }

    /**
     * 电子面单重复打印
     * https://api.kuaidi100.com/document/5f702a95f27ea83ce5f37b21.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function orderRptPrint($private_params)
    {
        return $this->request($this->printtask_host, 'printOld', $private_params);
    }

    /**
     * 电子面单图片接口
     * https://api.kuaidi100.com/document/5f0ff6b8bc8da837cbd8aef9.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function picPrint($private_params)
    {
        return $this->request($this->printtask_host, 'getPrintImg', $private_params);
    }

    /**
     * 电子面单HTML接口
     * https://api.kuaidi100.com/document/5f0ff6c42977d50a94e10236.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function htmlPrint($private_params)
    {
        return $this->request($this->eorderapi_host, 'getElecOrder', $private_params);
    }

    /**
     * 国际电子面单
     * https://api.kuaidi100.com/document/6089416bdb296372f4abfc33.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function intPrint($private_params)
    {
        return $this->request($this->eorderapi_host, 'intership', $private_params);
    }

    /**
     * 自定义打印接口
     * https://api.kuaidi100.com/document/5f0ffbed2977d50a94e1023d.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function customPrint($private_params)
    {
        return $this->request($this->printtask_host, 'printOrder', $private_params);
    }

    /**
     * 附件打印接口
     * https://api.kuaidi100.com/document/5f0ffbed2977d50a94e1023d.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function customAttPrint($private_params)
    {
        return $this->request($this->printtask_host, 'imgOrder', $private_params);
    }

    /**
     * 自定义生成图片接口
     * https://api.kuaidi100.com/document/5f0ffbed2977d50a94e1023d.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function customPicPrint($private_params)
    {
        return $this->request($this->printtask_host, 'getPrintImg', $private_params);
    }

    /**
     * 自定义复打接口
     * https://api.kuaidi100.com/document/5f0ffbed2977d50a94e1023d.
     *
     * @param $private_params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function customRptPrint($private_params)
    {
        return $this->request($this->printtask_host, 'printOld', $private_params);
    }

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function clean($private_params)
    {
        // TODO: Implement clean() method.
    }

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @return mixed
     */
    public function orderState($private_params)
    {
        // TODO: Implement orderState() method.
    }
}
