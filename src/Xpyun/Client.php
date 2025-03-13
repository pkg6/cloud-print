<?php

namespace Pkg6\CloudPrint\Xpyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    protected $host = 'https://open.xpyun.net/api/openapi/xprinter';

    protected $config = [
        'host' => "https://open.xpyun.net/api/openapi/xprinter",
        "user"=>"",
        "userKey"=>"",
    ];

}