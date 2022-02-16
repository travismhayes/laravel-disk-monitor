<?php

namespace TravisHayes\LaravelDiskMonitor\Http\Controllers;

use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMetricsController
{
    public function __invoke()
    {
        $entries = DiskMonitorEntry::latest()->get();

        return view('disk-monitor::entries', [
            'entries'=> $entries
        ]);
    }
}
