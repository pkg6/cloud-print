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

namespace Pkg6\CloudPrint\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Psr\Log\LoggerInterface;

trait HttpClientTrait
{

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger = null;

    /**
     * @var \GuzzleHttp\MessageFormatter
     */
    protected $messageFormatter = null;
    /**
     * @var array
     */
    protected $guzzleConfig = [
        'headers' => [
            'User-Agent' => 'cloud-print (https://github.com/pkg6/cloud-print)',
        ]
    ];

    /**
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return  $this
     */
    public function setRequestLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * @param \GuzzleHttp\MessageFormatter $messageFormatter
     *
     * @return $this
     */
    public function setMessageFormatter(MessageFormatter $messageFormatter)
    {
        $this->messageFormatter = $messageFormatter;

        return $this;
    }

    /**
     * @param string $url
     * @param array $query
     * @param array $headers
     *
     * @return string
     *
     * @throws GuzzleException
     */
    protected function httpGet(string $url, array $query = [], array $headers = [])
    {
        $options = [
            'headers' => $headers,
            'query' => $query,
        ];

        return $this->httpRequest('GET', $url, $options);
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return string
     *
     * @throws GuzzleException
     */
    protected function httpPost(string $url, array $params = [], array $headers = [])
    {
        $options = [
            'headers' => $headers,
            'form_params' => $params,
        ];

        return $this->httpRequest('POST', $url, $options);
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return string
     *
     * @throws GuzzleException
     */
    protected function httpPostJson(string $url, array $params = [], array $headers = [])
    {
        $options = [
            'headers' => $headers,
            'json' => $params,
        ];

        return $this->httpRequest('POST', $url, $options);
    }

    /**
     * @param $method
     * @param $url
     * @param $options
     *
     * @return string
     *
     * @throws GuzzleException
     */
    protected function httpRequest($method, $url, $options)
    {
        $resp = $this->httpClient()->request($method, $url, $options);

        return $resp->getBody()->getContents();
    }

    /**
     * @return Client
     */
    protected function httpClient()
    {
        $stack = HandlerStack::create();
        if ($this->logger) {
            if (is_null($this->messageFormatter)) {
                $this->setMessageFormatter(new MessageFormatter());
            }
            $stack->push(Middleware::log($this->logger, $this->messageFormatter));
        }

        return new Client(['handler' => $stack]);
    }
}
