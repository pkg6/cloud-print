<?php

namespace Pkg6\cloudPrint\Ushengyun;

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
