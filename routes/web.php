<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{city}', 'middleware' => 'set-city'], function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::get('/news', [MainController::class, 'news'])->name('news');
});
