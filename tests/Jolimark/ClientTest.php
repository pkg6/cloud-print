<?php

namespace Pkg6\CloudPrint\Tests\Jolimark;

use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testBindPrinter()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('bindPrinter', $private_params);
    }

    public function testUnBindPrinter()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('unBindPrinter', $private_params);
    }

    public function testQueryNotPrintTask()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('queryNotPrintTask', $private_params);
    }

    public function testCancelNotPrintTask()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('cancelNotPrintTask', $private_params);
    }

    public function testPrintHtmlCode()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
            'tex' => '',
        ];
        $this->methodPrivateParams('printHtmlCode', $private_params);
    }

    public function testPrintRichHtmlCode()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
            'tex' => '',
        ];
        $this->methodPrivateParams('printRichHtmlCode', $private_params);
    }

    public function testPrintHtmlUrl()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printHtmlUrl', $private_params);
    }

    public function testPrintHtmlToPic()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printHtmlToPic', $private_params);
    }

    public function testPrintHtmlToGrayPic()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printHtmlToGrayPic', $private_params);
    }

    public function testPrintEsc()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printEsc', $private_params);
    }

    public function testPrintPointText()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printPointText', $private_params);
    }

    public function testPrintLabel()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printLabel', $private_params);
    }

    public function testPrintExpress()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'template_id' => '',
            'jj_dwmc' => '',
            'jj_jjr' => '',
            'jj_lxdh' => '',
            'jj_dz' => '',
            'sj_dwmc' => '',
            'sj_sjr' => '',
            'sj_lxdh' => '',
            'sj_dz' => '',
            'wp_jtw' => '',
            'wp_smjz' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printExpress', $private_params);
    }

    public function testPrintHtmlTemplate()
    {
        $private_params = [
            'device_ids' => '',
            'template_id' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printHtmlTemplate', $private_params);
    }

    public function testPrintFile()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printFile', $private_params);
    }

    public function testFileByUrlPrint()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'file_type' => '',
            'bill_content' => '',
            'paper_width' => '',
            'paper_height' => '',
            'paper_type' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('fileByUrlPrint', $private_params);
    }

    public function testPrintInvoice()
    {
        $private_params = [
            'device_ids' => '',
            'copies' => '',
            'cus_orderid' => '',
            'bill_content' => '',
            'time_out' => '',
        ];
        $this->methodPrivateParams('printInvoice', $private_params);
    }

    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Jolimark();
        $client = $this->mockApiClient($app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }
}