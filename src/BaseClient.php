<?php

namespace Pkg6\CloudPrint;

use Pkg6\CloudPrint\Traits\CacheTrait;
use Pkg6\CloudPrint\Traits\HttpClientTrait;

class BaseClient
{
    use HttpClientTrait,CacheTrait;

    protected $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}