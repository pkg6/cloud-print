<?php

namespace Pkg6\cloudPrint\Zhongwuyun;

use Pkg6\cloudPrint\Kernel\ServiceContainer;

/**
 * Class AppContainer.
 *
 * @property Printer printer
 */
class AppContainer extends ServiceContainer
{
    protected $providers = [
        ServiceProvider::class,
    ];
}
