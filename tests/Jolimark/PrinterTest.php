<?php

namespace Pkg6\cloudPrint\Tests\Jolimark;

use Pkg6\cloudPrint\Jolimark\Printer;
use Pkg6\cloudPrint\Tests\BaseTest;


class PrinterTest extends BaseTest
{
    public function methodPrivateParams($method, $private_params)
    {
        $app = $this->Jolimark();
        $client = $this->mockApiClient(Printer::class, $app);
        $data = json_decode($client->$method($private_params), true);
        $this->assertIsArray($data);
    }

    public function testRegister()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('register', $private_params);
    }

    public function testDelete()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('delete', $private_params);
    }

    public function testOrderNotPrint()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('orderNotPrint', $private_params);
    }

    public function testClean()
    {
        $private_params = [
            'device_codes' => '',
        ];
        $this->methodPrivateParams('clean', $private_params);
    }

    public function testHtml2Print()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
            'tex'          => '',
        ];
        $this->methodPrivateParams('html2Print', $private_params);
    }

    public function testHtmlPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
            'tex'          => '',
        ];
        $this->methodPrivateParams('htmlPrint', $private_params);
    }

    public function testUrlPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('urlPrint', $private_params);
    }

    public function testPicPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('picPrint', $private_params);
    }

    public function testGrayPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('grayPrint', $private_params);
    }

    public function testPrintEsc()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('printEsc', $private_params);
    }

    public function testPointTextPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('pointTextPrint', $private_params);
    }

    public function testLabelPrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('labelPrint', $private_params);
    }

    public function testExpressPrint()
    {
        $private_params = [
            'device_ids'  => '',
            'copies'      => '',
            'cus_orderid' => '',
            'template_id' => '',
            'jj_dwmc'     => '',
            'jj_jjr'      => '',
            'jj_lxdh'     => '',
            'jj_dz'       => '',
            'sj_dwmc'     => '',
            'sj_sjr'      => '',
            'sj_lxdh'     => '',
            'sj_dz'       => '',
            'wp_jtw'      => '',
            'wp_smjz'     => '',
            'time_out'    => '',
        ];
        $this->methodPrivateParams('expressPrint', $private_params);
    }

    public function testPrintTemp()
    {
        $private_params = [
            'device_ids'   => '',
            'template_id'  => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('printTemp', $private_params);
    }

    public function testFilePrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'paper_width'  => '',
            'paper_height' => '',
            'paper_type'   => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('filePrint', $private_params);
    }

    public function testFileByUrlPrint()
    {
        $private_params = [
            'device_ids'     => '',
            'copies'         => '',
            'cus_orderid'    => '',
            'file_type'      => '',
            'bill_content'   => '',
            'paper_width'    => '',
            'paper_height'   => '',
            'paper_type'     => '',
            'time_out'       => '',
        ];
        $this->methodPrivateParams('fileByUrlPrint', $private_params);
    }

    public function testInvoicePrint()
    {
        $private_params = [
            'device_ids'   => '',
            'copies'       => '',
            'cus_orderid'  => '',
            'bill_content' => '',
            'time_out'     => '',
        ];
        $this->methodPrivateParams('invoicePrint', $private_params);
    }
}
