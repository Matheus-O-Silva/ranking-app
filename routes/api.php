<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ranking',[RankingController::class, 'index']);

Route::get('/',function () {
    return response()->json(['success' => true]);
});
