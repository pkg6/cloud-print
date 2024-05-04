<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * (L) Licensed <https://opensource.org/license/MIT>
 *
 * (A) zhiqiang <https://www.zhiqiang.wang>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\cloudPrint\Kernel;

/**
 * Class BaseClient.
 */
class BaseClient
{
    use HttpClient;
    /**
     * @var ServiceContainer
     */
    protected $app;

    /**
     * @var bool
     */
    public static $request_log = false;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * BaseClient constructor.
     *
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
        $this->config = $app->getConfig();
        $this->_initialize();
    }

    protected function _initialize()
    {
    }

    /**
     * @param $message
     * @param $request
     * @param $response
     */
    public function requestLog($message, $request, $response)
    {
        BaseClient::$request_log && $this->app->logger->debug($message, ['request' => $request, 'response' => $response]);
    }
}
