<?php

namespace Pkg6\cloudPrint\Xpyun;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
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
