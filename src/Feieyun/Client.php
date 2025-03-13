<?php

namespace Pkg6\CloudPrint\Feieyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'http://api.feieyun.cn/Api/Open/';

    protected $config = [
        'user' => "",
        'ukey' => "",
        'host' => "http://api.feieyun.cn/Api/Open/",
    ];
}