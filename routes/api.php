<?php

use App\Http\Controllers\IndustryController;
use App\Http\Controllers\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/industry', [IndustryController::class, 'all']);
Route::get('/industry/{industry}', [IndustryController::class, 'getById']);
Route::post('/industry', [IndustryController::class, 'store']);
Route::put('/industry/{industry}', [IndustryController::class, 'update']);
Route::post('/offer', [OfferController::class, 'store']);
Route::put('/offer/{offer}', [OfferController::class, 'update']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
