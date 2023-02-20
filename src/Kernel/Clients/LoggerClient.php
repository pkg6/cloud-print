<?php

namespace Pkg6\cloudPrint\Kernel\Clients;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pkg6\cloudPrint\Kernel\BaseClient;


class LoggerClient extends BaseClient
{

    /**
     * @var array
     */
    protected $lconfig = [
        'channel' => 'cloud-print',
        'stream'  => null,
        'level'   => Logger::DEBUG
    ];


    /**
     * @return mixed|void
     */
    protected function _initialize()
    {
        $this->lconfig = array_merge($this->lconfig, $this->config['logger'] ?? []);
    }


    /**
     * @param $channel
     * @return Logger
     */
    public function channel($channel)
    {
        $logger = new Logger($channel);
        $stream = $this->lconfig['stream'] ?: './runtime' . DIRECTORY_SEPARATOR . $channel . DIRECTORY_SEPARATOR . date('Ymd') . '.log';
        $logger->pushHandler(new StreamHandler($stream, $this->lconfig['level']));
        return $logger;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->channel($this->lconfig['channel'])->$name(...$arguments);
    }
}