<?php

namespace Pkg6\CloudPrint\Jolimark;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;
use UnexpectedValueException;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'http://mcp.jolimark.com/';
    /**
     * @var string
     */
    protected $signType = 'MD5';

    protected $config = [
        'host' => "http://mcp.jolimark.com/",
        'app_id' => "",
        'app_key' => "",
    ];

    /**
     * 添加打印机.
     *
     * @param $private_params
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function bindPrinter($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/BindPrinter', $private_params);
    }

    /**
     * 检查打印机绑定结果.
     *
     * @param $private_params
     *
     * @return string
     * @throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function checkPrinterEnableBind($private_params)
    {
        return $this->request('POST', 'v3/sys/CheckPrinterEnableBind', $private_params);
    }

    /**
     * 删除打印机.
     *
     * @param $private_params
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function unBindPrinter($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/UnBindPrinter', $private_params);
    }

    /**
     * 获取某台打印机状态
     *
     * @param $private_params
     *
     * @return mixed
     * @throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function queryPrinterStatus($private_params)
    {
        return $this->request('GET', 'mcp/v3/sys/QueryPrinterStatus', $private_params);
    }

    /**
     * 打印.
     *
     * @param $private_params
     * @param $type
     *
     * @return mixed
     * @throws GuzzleException
     *
     */
    public function print($private_params, $type)
    {
        switch ($type) {
            //简单url
            case 1:
                $resp = $this->printHtmlUrl($private_params);
                break;
            //简单html
            case 2:
                $resp = $this->printHtmlCode($private_params);
                break;
            //复杂url转图片
            case 3:
                $resp = $this->printHtmlToPic($private_params);
                break;
            //复杂url转灰度图
            case 4:
                $resp = $this->printHtmlToGrayPic($private_params);
                break;
            //映美模版
            case 5:
                $resp = $this->printHtmlTemplate($private_params);
                break;
            //坐标
            case 6:
                $resp = $this->printPointText($private_params);
                break;
            //快递单
            case 7:
                $resp = $this->printExpress($private_params);
                break;
            //打印复杂页面(html代码)
            case 8:
                $resp = $this->printRichHtmlCode($private_params);
                break;
            //打印ESC指令
            case 9:
                $resp = $this->printEsc($private_params);
                break;
            //打印本地文件
            case 10:
                $resp = $this->printFile($private_params);
                break;
            //打印远程文件
            case 11:
                $resp = $this->fileByUrlPrint($private_params);
                break;
            default:
                throw new UnexpectedValueException("{$type} Command not entered");
        }
        return $resp;
    }
    /**
     * 打印映美规范HTML页面-传URL地址
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printHtmlUrl($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintHtmlUrl', $private_params);
    }

    /**
     * 打印标准规范HTML页面-传URL.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printHtmlToPic($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintHtmlToPic', $private_params);
    }

    /**
     * 打印映美规范HTML页面-传HTML代码
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printHtmlCode($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintHtmlCode', $private_params);
    }

    /**
     * 打印标准规范HTML页面-传HTML代码
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printRichHtmlCode($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintRichHtmlCode', $private_params);
    }

    /**
     * 打印标准规范html页面-转灰度图.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printHtmlToGrayPic($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintHtmlToGrayPic', $private_params);
    }

    /**
     * 打印定点坐标文本.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printPointText($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintPointText', $private_params);
    }

    /**
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printLabel($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintLabel', $private_params);
    }

    /**
     * 打印快递面单.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printExpress($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintExpress', $private_params);
    }

    /**
     * 用户创建打印模版.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printHtmlTemplate($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintHtmlTemplate', $private_params);
    }

    /**
     * 打印ESC指令.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printEsc($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintEsc', $private_params);
    }

    /**
     * 打印本地文档.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printFile($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintFile', $private_params);
    }

    /**
     * 打印远程文档.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function fileByUrlPrint($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintFileByUrl', $private_params);
    }

    /**
     * 增值税专用发票打印.
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function printInvoice($private_params)
    {
        return $this->request('POST', 'mcp/v2/sys/PrintInvoice', $private_params);
    }

    /**
     * 清空待打印队列.
     *
     * @param $private_params
     *
     * @return mixed
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function cancelNotPrintTask($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/CancelNotPrintTask', $private_params);
    }

    /**
     * 查询订单是否打印成功
     *
     * @param $private_params
     *
     * @return mixed
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function queryPrintTaskStatus($private_params)
    {
        return $this->request('GET', 'mcp/v3/sys/QueryPrintTaskStatus', $private_params);
    }

    /**
     * 查询未打印的任务
     *
     * @param $private_params
     *
     * @return string
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     *
     */
    public function queryNotPrintTask($private_params)
    {
        return $this->request('GET', 'mcp/v3/sys/QueryNotPrintTask', $private_params);
    }
}