# Monitor Laravel Disk Metrics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/travishayes/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/travishayes/laravel-disk-monitor)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/travishayes/laravel-disk-monitor/run-tests?label=tests)](https://github.com/travishayes/laravel-disk-monitor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/travishayes/laravel-disk-monitor/Check%20&%20fix%20styling?label=code%20style)](https://github.com/travishayes/laravel-disk-monitor/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/travishayes/laravel-disk-monitor.svg?style=flat-square)](https://packagist.org/packages/travishayes/laravel-disk-monitor)

## Installation

You can install the package via composer:

```bash
composer require travishayes/laravel-disk-monitor
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-disk-monitor-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-disk-monitor-config"
```

This is the contents of the published config file:

```php
return [
    /**
     * The name of the
     */
    'disk_names' => [
        'local',
    ]
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-disk-monitor-views"
```

Finally, you should schedule the `Spatie\DiskMonitor\Commands\RecordsDiskMetricsCommand` to run daily.

```php
// in app/Console/Kernel.php

use TravisHayes\LaravelDiskMonitor\Commands\RecordsDiskMetricsCommand;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
       // ...
        $schedule->command(RecordsDiskMetricsCommand::class)->daily();
    }
}

```

## Usage

You can view the amount of files each monitored disk has, in the `disk_monitor_entries` table.

If you want to view the statistics in the browser add this macro to your routes file.

```php
// in a routes files

Route::diskMonitor('my-disk-monitor-url');
```

Now, you can see all statics when browsing `/my-disk-monitor-url`. Of course, you can use any url you want when using the `diskMonitor` route macro. We highly recommand using the `auth` middleware for this route, so guests can't see any data regarding your disks.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Travis Hayes](https://github.com/hayes9321)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
