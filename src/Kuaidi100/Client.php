<?php

namespace Pkg6\CloudPrint\Kuaidi100;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    protected $config = [
        'key' => "",
        'secret' => "",
    ];
}