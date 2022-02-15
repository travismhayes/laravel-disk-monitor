<?php

namespace TravisHayes\LaravelDiskMonitor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskMonitorEntry extends Model
{
    use HasFactory;

    public $guarded = [];
}
