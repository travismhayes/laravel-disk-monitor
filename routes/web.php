<?php

use Illuminate\Support\Facades\Route;
use TravisHayes\LaravelDiskMonitor\Http\Controllers\DiskMetricsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/disk-monitor', DiskMetricsController::class);
