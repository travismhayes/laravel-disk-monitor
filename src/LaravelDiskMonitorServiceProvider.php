<?php

namespace TravisHayes\LaravelDiskMonitor;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TravisHayes\LaravelDiskMonitor\Commands\RecordDiskMetricsCommand;
use TravisHayes\LaravelDiskMonitor\Http\Controllers\DiskMetricsController;

class LaravelDiskMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-disk-monitor')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_disk_monitor_tables')
            ->hasCommand(RecordDiskMetricsCommand::class);
    }

    public function packageRegistered()
    {
        Route::macro('diskMonitor', function (string $prefix) {
            Route::prefix($prefix)->group(function () {
                Route::get('/', '\\' . DiskMetricsController::class);
            });
        });
    }
}
