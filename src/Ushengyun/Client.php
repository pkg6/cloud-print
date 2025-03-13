<?php

namespace Pkg6\CloudPrint\Ushengyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://open-api.ushengyun.com/printer';

    protected $config = [
        'host' => "https://open-api.ushengyun.com/printer",
        'appId' => "",
        'appSecret' => "",
    ];
}