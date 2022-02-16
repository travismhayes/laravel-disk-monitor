<?php

namespace TravisHayes\LaravelDiskMonitor\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use TravisHayes\LaravelDiskMonitor\Models\DiskMonitorEntry;

class DiskMonitorEntryFactory extends Factory
{
    protected $model = DiskMonitorEntry::class;

    public function definition(): array
    {
        return [
            'disk_name' => $this->faker->word,
            'file_count' => rand(0, 10),
        ];
    }
}
