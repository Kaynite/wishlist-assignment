<?php

use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ItemStatisticController;
use Illuminate\Support\Facades\Route;

Route::as('api.')->group(function () {
    Route::get('items/stats', ItemStatisticController::class)->name('items.stats');
    Route::apiResource('items', ItemController::class)->except(['update', 'destroy']);
});
