<?php


use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'main'])-> name('main');

Route::get('login', [MainController::class, 'login'])-> name('login');

Route::get('logout', [MainController::class, 'logout'])-> name('logout');

Route::resource('product', ProductController::class);

Route::resource('furniture', FurnitureController::class);
