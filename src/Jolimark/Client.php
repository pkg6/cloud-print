<?php

namespace Pkg6\CloudPrint\Jolimark;

use Pkg6\CloudPrint\BaseClient;

class Client extends BaseClient
{
    use ReqTrait;

    /**
     * @var string
     */
    protected $host = 'http://mcp.jolimark.com/';
    /**
     * @var string
     */
    protected $signType = 'MD5';

    protected $config = [
        'host' => "http://mcp.jolimark.com/",
        'app_id' => "",
        'app_key' => "",
    ];
}