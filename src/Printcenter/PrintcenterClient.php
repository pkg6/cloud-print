<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Printcenter;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Pkg6\cloudPrint\Kernel\BaseClient;

/**
 * Class PrintcenterClient.
 */
class PrintcenterClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'http://open.printcenter.cn:8080';

    /**
     * @param $action
     * @param $private_params
     *
     * @throws GuzzleException
     * @throws Exception
     *
     * @return string
     */
    public function request($action, $private_params)
    {
        $url = $this->config['host'] ?? $this->host . ($action ? ('/' . ltrim($action, '/')) : '');
        $public_params = [
            'key' => $this->config['key'],
        ];
        $params = array_filter(array_merge($public_params, $private_params));
        $resp = $this->httpPost($url, $params);
        $this->requestLog('POST:' . $url, $params, $resp);

        return $resp;
    }
}
