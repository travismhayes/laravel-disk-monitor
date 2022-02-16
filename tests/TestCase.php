<?php

namespace TravisHayes\LaravelDiskMonitor\Tests;

use CreateDiskMonitorTables;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;
use TravisHayes\LaravelDiskMonitor\LaravelDiskMonitorServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            function (string $modelName) {
                return 'TravisHayes\\LaravelDiskMonitor\\Database\\Factories\\' . class_basename($modelName) . 'Factory';
            }
        );

        Route::diskMonitor('disk-monitor');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelDiskMonitorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        include_once __DIR__.'/../database/migrations/create_disk_monitor_tables.php.stub';
        (new CreateDiskMonitorTables())->up();
    }
}
