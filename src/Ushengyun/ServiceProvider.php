<?php

namespace Pkg6\cloudPrint\Ushengyun;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['printer'] = function ($app) {
            return new Printer($app);
        };
    }
}
