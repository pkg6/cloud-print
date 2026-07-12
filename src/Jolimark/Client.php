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

namespace Pkg6\CloudPrint\Jolimark;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;
use Pkg6\CloudPrint\Requests\PrintRequest;

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
     *
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
     *
     * @throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
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
     *
     * @throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     * @throws GuzzleException
     */
    public function print(PrintRequest $request): string
    {
        $params = $this->buildPrintParams($request);

        return $this->printByType($params, $request->getType());
    }

    protected function printByType(array $params, ?string $type): string
    {
        switch ($type) {
            case 'html_url':
                return $this->printHtmlUrl($params);
            case 'html_code':
                return $this->printHtmlCode($params);
            case 'html_to_pic':
                return $this->printHtmlToPic($params);
            case 'html_to_gray_pic':
                return $this->printHtmlToGrayPic($params);
            case 'template':
                return $this->printHtmlTemplate($params);
            case 'point_text':
                return $this->printPointText($params);
            case 'express':
                return $this->printExpress($params);
            case 'rich_html_code':
                return $this->printRichHtmlCode($params);
            case 'esc':
                return $this->printEsc($params);
            case 'file':
                return $this->printFile($params);
            case 'file_by_url':
                return $this->fileByUrlPrint($params);
            case 'label':
                return $this->printLabel($params);
            case 'invoice':
                return $this->printInvoice($params);
            default:
                return $this->printHtmlUrl($params);
        }
    }

    protected function buildPrintParams(PrintRequest $request): array
    {
        $params = [
            'sn' => $request->getSn(),
        ];

        if ($request->getContent()) {
            $params['content'] = $request->getContent();
        }

        if ($request->getCopies() > 1) {
            $params['times'] = $request->getCopies();
        }

        if ($request->getOrderId()) {
            $params['orderid'] = $request->getOrderId();
        }

        if ($request->getTemplateId()) {
            $params['templateId'] = $request->getTemplateId();
        }

        if ($request->getImageUrl()) {
            $params['imageUrl'] = $request->getImageUrl();
        }

        if ($request->getHtmlUrl()) {
            $params['htmlUrl'] = $request->getHtmlUrl();
        }

        if ($request->getExtra()) {
            $params = array_merge($params, $request->getExtra());
        }

        return array_filter($params, fn ($v) => ! is_null($v));
    }
    /**
     * 打印映美规范HTML页面-传URL地址
     *
     * @param $private_params
     *
     * @return string
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     */
    public function printPointText($private_params)
    {
        return $this->request('POST', 'mcp/v3/sys/PrintPointText', $private_params);
    }

    /**
     * @param $private_params
     *
     * @return string
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
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
     *
     *@throws GuzzleException|\Psr\SimpleCache\InvalidArgumentException
     */
    public function queryNotPrintTask($private_params)
    {
        return $this->request('GET', 'mcp/v3/sys/QueryNotPrintTask', $private_params);
    }
}
