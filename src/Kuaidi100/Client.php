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

namespace Pkg6\CloudPrint\Kuaidi100;

use Pkg6\CloudPrint\BaseClient;
use Pkg6\CloudPrint\Requests\PrintRequest;

class Client extends BaseClient
{
    use ReqTrait;

    protected $config = [
        'key' => "",
        'secret' => "",
    ];

    public function print(PrintRequest $request): string
    {
        $params = $this->buildPrintParams($request);

        return $this->request("", 'imgOrder', $params);
    }

    protected function buildPrintParams(PrintRequest $request): array
    {
        $params = [
            'sn' => $request->getSn(),
            'content' => $request->getContent(),
        ];

        if ($request->getCopies() > 1) {
            $params['times'] = $request->getCopies();
        }

        if ($request->getOrderId()) {
            $params['orderid'] = $request->getOrderId();
        }

        if ($request->getExtra()) {
            $params = array_merge($params, $request->getExtra());
        }

        return array_filter($params, fn ($v) => ! is_null($v));
    }
}
