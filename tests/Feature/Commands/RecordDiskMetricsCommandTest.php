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
    public function it_will_record_the_file_count_for_a_disk()
    {
        $this->artisan(RecordDiskMetricsCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(0, $entry->file_count);

        Storage::put('test.txt', 'test');
        $this->artisan(RecordDiskMetricsCommand::class)->assertExitCode(0);
        $entry = DiskMonitorEntry::last();
        $this->assertEquals(1, $entry->file_count);
    }
}
