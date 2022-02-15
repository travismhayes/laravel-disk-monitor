<?php

namespace TravisHayes\LaravelDiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;
use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk-monitor:metrics';

    public $description = 'Monitor disk metrics';

    public function handle(): int
    {
        collect(config('disk-monitor.disk_name'))
            ->each(fn(string $diskName) => $this->recordMetrics($diskName));

        $this->comment('All done!');

        return self::SUCCESS;
    }

    protected function recordMetrics(string $diskName): void
    {
        $this->info("Recording metrics for disk `{$diskName}` ... ");

        $disk = Storage::disk($diskName);

        $fileCount = count($disk->allFiles());

        DiskMonitorEntry::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount,
        ]);

    }
}
