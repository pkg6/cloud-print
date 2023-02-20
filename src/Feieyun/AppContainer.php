<?php

namespace Pkg6\cloudPrint\Feieyun;

use Pkg6\cloudPrint\Kernel\ServiceContainer;


class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        ServiceProvider::class,
    ];
}
