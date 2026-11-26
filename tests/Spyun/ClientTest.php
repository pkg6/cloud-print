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

namespace Pkg6\CloudPrint\Tests\Spyun;

use Pkg6\CloudPrint\Requests\PrintRequest;
use Pkg6\CloudPrint\Spyun\Client;
use Pkg6\CloudPrint\Tests\BaseTest;

class ClientTest extends BaseTest
{
    public function testSign()
    {
        $client = $this->Spyun();
        $params = [
            'appid' => 'sp5c1314095ed15',
            'timestamp' => 1544765945,
            'sn' => '111111111',
            'pkey' => '22222222',
            'name' => 'test',
        ];
        $this->assertSame('3C24E50A3F1E0B4AB60FFA3A78E19E18', $this->invokeSign($client, $params));
    }

    public function testPrint()
    {
        $client = $this->recordingClient();
        $request = PrintRequest::create()
            ->sn('111111111')
            ->content('订单内容')
            ->copies(2);

        $this->assertSame('{"res":"SUCCESS"}', $client->print($request));
        $this->assertSame('POST', $client->calls[0]['method']);
        $this->assertSame('https://open.spyun.net/v1/printer/print', $client->calls[0]['url']);
        $this->assertSame('111111111', $client->calls[0]['options']['form_params']['sn']);
        $this->assertSame('订单内容', $client->calls[0]['options']['form_params']['content']);
        $this->assertSame(2, $client->calls[0]['options']['form_params']['times']);
        $this->assertArrayHasKey('sign', $client->calls[0]['options']['form_params']);
    }

    public function testPrintLabel()
    {
        $client = $this->recordingClient();
        $client->print(PrintRequest::create()->sn('111111111')->content('标贴内容')->type('label'));

        $this->assertSame('https://open.spyun.net/v1/printer/printLabel', $client->calls[0]['url']);
    }

    /**
     * @dataProvider endpointProvider
     */
    public function testEndpoints($methodName, $arguments, $httpMethod, $action)
    {
        $client = $this->recordingClient();
        $client->$methodName(...$arguments);

        $this->assertSame($httpMethod, $client->calls[0]['method']);
        $this->assertSame('https://open.spyun.net/v1/' . $action, $client->calls[0]['url']);
        $options = $client->calls[0]['options'];
        $params = in_array($httpMethod, ['GET', 'DELETE'], true) ? $options['query'] : $options['form_params'];
        $this->assertArrayHasKey('appid', $params);
        $this->assertArrayHasKey('timestamp', $params);
        $this->assertArrayHasKey('sign', $params);
    }

    public function endpointProvider()
    {
        return [
            ['addPrinter', ['111111111', 'abcdefgh', '收银台'], 'POST', 'printer/add'],
            ['addPrinterList', ['111111111 # abcdefgh'], 'POST', 'printer/addList'],
            ['getPrinterModel', ['111111111'], 'POST', 'printer/getModel'],
            ['getPrinter', ['111111111'], 'GET', 'printer/info'],
            ['updatePrinter', ['111111111', '收银台'], 'PATCH', 'printer/update'],
            ['updatePrinterSetting', ['111111111', 1, 'W'], 'PATCH', 'printer/setting'],
            ['deletePrinter', ['111111111'], 'DELETE', 'printer/delete'],
            ['printLabel', [['sn' => '111111111', 'content' => '标贴内容']], 'POST', 'printer/printLabel'],
            ['deletePrints', ['111111111'], 'DELETE', 'printer/cleansqs'],
            ['getPrintsStatus', ['1001'], 'GET', 'printer/order/status'],
            ['getPrintsOrders', ['111111111', '2019-01-28'], 'GET', 'printer/order/number'],
        ];
    }

    protected function invokeSign(Client $client, array $params)
    {
        $method = new \ReflectionMethod($client, 'sign');
        $method->setAccessible(true);

        return $method->invoke($client, $params);
    }

    protected function recordingClient()
    {
        return new class([ 'appid' => 'sp5c1314095ed15', 'appsecret' => '735aa25a15b75e6c1e0760823a22346a', ]) extends Client {
            public $calls = [];

            protected function httpRequest($method, $url, $options)
            {
                $this->calls[] = ['method' => $method, 'url' => $url, 'options' => $options];

                return '{"res":"SUCCESS"}';
            }
        };
    }
}
