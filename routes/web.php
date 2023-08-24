<?php

use App\Http\Controllers\Web\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
