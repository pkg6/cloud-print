<?php

namespace Pkg6\CloudPrint;

use Pkg6\CloudPrint\Traits\CacheTrait;
use Pkg6\CloudPrint\Traits\HttpClientTrait;
use Pkg6\CloudPrint\Traits\LoggerTrait;

class BaseClient
{
    use HttpClientTrait,LoggerTrait,CacheTrait;

    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}