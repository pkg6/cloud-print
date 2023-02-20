<?php

namespace Pkg6\cloudPrint\Yilianyun;

use Pkg6\cloudPrint\Kernel\ServiceContainer;

/**
 * Class AppContainer.
 *
 * @property Printer printer
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        ServiceProvider::class,
    ];
}
