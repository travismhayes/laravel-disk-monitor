<?php

namespace TravisHayes\LaravelDiskMonitor;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TravisHayes\LaravelDiskMonitor\Commands\RecordDiskMetricsCommand;

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
            ->hasRoute('web')
            ->hasMigration('create_disk_monitor_tables')
            ->hasCommand(RecordDiskMetricsCommand::class);
    }
}
