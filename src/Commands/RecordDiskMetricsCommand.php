<?php

namespace TravisHayes\LaravelDiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;

class RecordDiskMetricsCommand extends Command
{
    public $signature = 'disk-monitor:metrics';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('Recording metrics ...');

        $diskName = config('disk-monitor.disk_name');

        $fileCount = count(Storage::disk($diskName)->allFiles());

        DiskMonitorEntry::create([
            'disk_name' => $diskName,
            'file_count' => $fileCount,
        ]);

        $this->comment('All done!');

        return self::SUCCESS;
    }
}
