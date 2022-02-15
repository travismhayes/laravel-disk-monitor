<?php

namespace TravisHayes\LaravelDiskMonitor\Tests\Feature\Commands;

use Illuminate\Support\Facades\Storage;
use TravisHayes\LaravelDiskMonitor\Commands\RecordDiskMetricsCommand;
use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;
use TravisHayes\LaravelDiskMonitor\Tests\TestCase;

class RecordDiskMetricsCommandTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');
    }

    /** @test */
    public function it_will_record_zero_files_for_empty_disks()
    {
        Storage::disk('local')->put('test.txt', 'test');

        $this
            ->artisan(RecordDiskMetricsCommand::class)
            ->assertExitCode(0);

        $this->assertCount(1, DiskMonitorEntry::get());
    }
}
