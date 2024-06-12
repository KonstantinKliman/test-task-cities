<?php

use App\Http\Controllers\Api\v1\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cities', [CityController::class, 'store']);
Route::delete('/cities/{id}', [CityController::class, 'destroy']);
