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

namespace Pkg6\CloudPrint\Spyun;

use GuzzleHttp\Exception\GuzzleException;
use Pkg6\CloudPrint\BaseClient;
use Pkg6\CloudPrint\Requests\PrintRequest;

/**
 * 商鹏智能云打印 https://www.spyun.net/open/index.html.
 */
class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'https://open.spyun.net/v1/';

    protected $config = [
        'host' => 'https://open.spyun.net/v1/',
        'appid' => '',
        'appsecret' => '',
    ];

    /**
     * 添加设备.
     *
     * @param string $sn   设备编号
     * @param string $pkey 设备KEY（查看设备底部标签）
     * @param string $name 设备名称/备注
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function addPrinter($sn, $pkey, $name = '')
    {
        return $this->request('POST', 'printer/add', [
            'sn' => $sn,
            'pkey' => $pkey,
            'name' => $name,
        ]);
    }

    /**
     * 批量添加设备（每次最多100台）.
     *
     * @param string $content 按“设备编号(SN) # 设备密钥(KEY) # 备注名称”格式排版，换行添加下一台
     * @param int    $business 1：打印业务（默认），2：扫码业务
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function addPrinterList($content, $business = 1)
    {
        return $this->request('POST', 'printer/addList', [
            'content' => $content,
            'business' => $business,
        ]);
    }

    /**
     * 查询设备类型（58mm热敏打印机 / 标签打印机等）.
     *
     * @param string $sn 设备编号
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getPrinterModel($sn)
    {
        return $this->request('POST', 'printer/getModel', ['sn' => $sn]);
    }

    /**
     * 获取设备信息.
     *
     * @param string $sn 设备编号
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getPrinter($sn)
    {
        return $this->request('GET', 'printer/info', ['sn' => $sn]);
    }

    /**
     * 修改设备信息.
     *
     * @param string $sn   设备编号
     * @param string $name 设备备注名
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function updatePrinter($sn, $name)
    {
        return $this->request('PATCH', 'printer/update', [
            'sn' => $sn,
            'name' => $name,
        ]);
    }

    /**
     * 修改设备配置参数.
     *
     * @param string   $sn       设备编号
     * @param int|null $auto_cut 是否自动切纸
     * @param string|null $voice 语音播报配置：N/U/V/W 等
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function updatePrinterSetting($sn, $auto_cut = null, $voice = null)
    {
        return $this->request('PATCH', 'printer/setting', [
            'sn' => $sn,
            'auto_cut' => $auto_cut,
            'voice' => $voice,
        ]);
    }

    /**
     * 删除设备.
     *
     * @param string $sn 设备编号
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function deletePrinter($sn)
    {
        return $this->request('DELETE', 'printer/delete', ['sn' => $sn]);
    }

    /**
     * 打印订单（统一打印入口），type 为 label 时使用标贴打印接口.
     *
     * @throws GuzzleException
     */
    public function print(PrintRequest $request): string
    {
        $params = $this->buildPrintParams($request);

        if ($request->getType() === 'label') {
            return $this->printLabel($params);
        }

        return $this->request('POST', 'printer/print', $params);
    }

    /**
     * @return array
     */
    protected function buildPrintParams(PrintRequest $request): array
    {
        $params = [
            'sn' => $request->getSn(),
            'content' => $request->getContent(),
        ];

        if ($request->getCopies() > 1) {
            $params['times'] = $request->getCopies();
        }

        if ($request->getExtra()) {
            $params = array_merge($params, $request->getExtra());
        }

        return $params;
    }

    /**
     * 打印标贴（仅商鹏标贴云打印机可用）.
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function printLabel($private_params)
    {
        return $this->request('POST', 'printer/printLabel', $private_params);
    }

    /**
     * 清空待打印订单.
     *
     * @param string $sn 设备编号
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function deletePrints($sn)
    {
        return $this->request('DELETE', 'printer/cleansqs', ['sn' => $sn]);
    }

    /**
     * 查询打印订单状态.
     *
     * @param string $id 打印订单ID
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getPrintsStatus($id)
    {
        return $this->request('GET', 'printer/order/status', ['id' => $id]);
    }

    /**
     * 查询设备历史打印订单数.
     *
     * @param string $sn   设备编号
     * @param string $date 日期，例如 2019-01-28
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getPrintsOrders($sn, $date)
    {
        return $this->request('GET', 'printer/order/number', [
            'sn' => $sn,
            'date' => $date,
        ]);
    }
}
