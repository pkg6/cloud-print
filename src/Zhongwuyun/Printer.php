<?php

namespace Pkg6\cloudPrint\Zhongwuyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\Interfaces\PrinterInterface;

/**
 * Class Printer.
 */
class Printer extends ZhongwuyunClient implements PrinterInterface
{
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
        return $this->request('status', $private_params, true);
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
    public function print($private_params, $type = '')
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
    public function clean($private_params)
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
    public function cleanOne($private_params)
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
    public function orderState($private_params)
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
    public function setSound($private_params)
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
    public function setVoice($private_params)
    {
        return $this->request('voice', $private_params);
    }
}
