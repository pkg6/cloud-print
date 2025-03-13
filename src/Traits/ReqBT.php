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

trait ReqBT
{
    protected $_requestUrl;

    public function setRequestUrl($requestUrl)
    {
        $this->_requestUrl = $requestUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequestUrl()
    {
        if ($this->_requestUrl) {
            return $this->_requestUrl;
        }

        return $this->config['host'] ?? $this->host;
    }
}
