<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('catalog');
});
Route::get('/cart', function () {
    return view('cart');
});

Route::get('/test', [\App\Http\Controllers\ProductController::class, 'index']);
