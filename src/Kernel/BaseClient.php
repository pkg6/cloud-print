<?php

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
        $this->app    = $app;
        $this->config = $app->getConfig();
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
