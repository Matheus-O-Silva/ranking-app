<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RankingController;

Route::get('/channels-ranking',[RankingController::class, 'index']);
Route::get('/users-ranking',[RankingController::class, 'getUserRanking']);