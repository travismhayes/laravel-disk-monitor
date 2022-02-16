<?php


namespace TravisHayes\LaravelDiskMonitor\Tests\Feature\Http\Controllers;

use \TravisHayes\LaravelDiskMonitor\Tests\TestCase;

class DiskMetricsControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_can_display_the_list_of_entries()
    {
        $this
            ->get('/disk-monitor')
            ->assertOk();
    }
}
