<?php

namespace TravisHayes\LaravelDiskMonitor\Tests\Feature\Http\Controllers;

use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;
use TravisHayes\LaravelDiskMonitor\Tests\TestCase;

class DiskMetricsControllerTest extends TestCase
{
    /** @test */
    public function it_can_display_the_list_of_entries()
    {
        $entry = DiskMonitorEntry::factory()->create();

        $this
            ->get('disk-monitor')
            ->assertOk()
            ->assertSee($entry->disk_name)
            ->assertSee($entry->file_count);
    }
}
