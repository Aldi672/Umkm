<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OvenStatusController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('aroma-rasa'))->name('home');

// API
Route::get('/api/products', [ProductController::class, 'index']);
Route::get('/api/oven-status', [OvenStatusController::class, 'show']);
Route::post('/api/orders', [OrderController::class, 'store']);
Route::get('/api/orders/{invoice}', [OrderController::class, 'show']);

// legacy aliases
Route::get('/catalog', [ProductController::class, 'index']);
Route::post('/checkout', [OrderController::class, 'store']);
Route::get('/order/track/{invoice}', [OrderController::class, 'show']);
