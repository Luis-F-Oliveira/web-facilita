<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\NotifyController;
use App\Http\Controllers\Api\ServantsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function() {
    Route::get('servants', [ServantsController::class, 'index']);
    Route::post('save', [DataController::class, 'store']);
    Route::get('date', [DataController::class, 'show']);
    Route::post('notify', [NotifyController::class, 'index']);
});
