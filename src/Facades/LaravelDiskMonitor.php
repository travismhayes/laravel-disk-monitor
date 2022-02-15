<?php

namespace TravisHayes\LaravelDiskMonitor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TravisHayes\LaravelDiskMonitor\LaravelDiskMonitor
 */
class LaravelDiskMonitor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-disk-monitor';
    }
}
