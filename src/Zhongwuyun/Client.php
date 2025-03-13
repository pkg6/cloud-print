<?php

namespace Pkg6\CloudPrint\Zhongwuyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;
    protected $host = 'http://api.zhongwuyun.com';

    protected $config = [
        'host'=>"http://api.zhongwuyun.com",
        'appid'=>"",
        'appsecret'=>"",
    ];
}