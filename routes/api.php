<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RankingController;

Route::get('/ranking',[RankingController::class, 'index']);