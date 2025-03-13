<?php

namespace Pkg6\CloudPrint\Yilianyun;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'https://open-api.10ss.net/';

    protected $config = [
        'host' => "https://open-api.10ss.net/",
        'client_id' => "",
        'client_secret' => "",
    ];
}