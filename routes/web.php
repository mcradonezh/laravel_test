<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('catalog');
});
Route::get('/cart', function () {
    return view('cart');
});*/

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/reg', [\App\Http\Controllers\AuthController::class, 'reg'])->name('reg');

Route::post('/auth', [\App\Http\Controllers\AuthController::class, 'auth'])->name('auth');
Route::post('/reguser', [\App\Http\Controllers\AuthController::class, 'regUser'])->name('reguser');
Route::post('/addtocart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addtocart');

Route::get('/orders', [\App\Http\Controllers\CartController::class, 'index'])->middleware('auth');
Route::get('/makeorder', [\App\Http\Controllers\OrderController::class, 'makeOrder'])/*->middleware('auth')*/->name('makeorder');;
