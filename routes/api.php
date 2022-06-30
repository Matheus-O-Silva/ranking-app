<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RankingController;
use App\Http\Controllers\Api\ChannelController;

Route::get('/channels',[ChannelController::class, 'index']);

Route::get('/channels-ranking',[RankingController::class, 'index']);
Route::get('/users-ranking',[RankingController::class, 'getUserRanking']);