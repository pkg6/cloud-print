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

namespace Pkg6\CloudPrint\Contracts;

use GuzzleHttp\MessageFormatter;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;

interface ClientInterface
{
    /**
     * @param \Psr\SimpleCache\CacheInterface $cache
     *
     * @return mixed
     */
    public function setCache(CacheInterface $cache);

    /**
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return $this
     */
    public function setRequestLogger(LoggerInterface $logger);

    /**
     * @param \GuzzleHttp\MessageFormatter $messageFormatter
     *
     * @return mixed
     */
    public function setMessageFormatter(MessageFormatter $messageFormatter);

    /**
     * @param $requestUrl
     *
     * @return $this
     */
    public function setRequestUrl($requestUrl);

    /**
     * @return string
     */
    public function getRequestUrl();

    /**
     * @param $method
     * @param $action
     * @param $privateParams
     *
     * @return mixed
     */
    public function request($method, $action, $privateParams);
}
