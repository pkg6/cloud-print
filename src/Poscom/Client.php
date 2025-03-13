<?php

namespace Pkg6\CloudPrint\Poscom;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://api.poscom.cn/';

    protected $config = [
        'host' => "https://api.poscom.cn/",
        'memberCode' => "",
        'apiKey' => "",
    ];
}