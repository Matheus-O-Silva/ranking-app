<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WatchedTimeController;
use App\Http\Controllers\Api\ChannelController;

Route::get('/channels-ranking',[ChannelController::class, 'index']);
Route::get('/users-ranking',[WatchedTimeController::class, 'index']);