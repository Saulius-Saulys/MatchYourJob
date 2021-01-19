<?php

use App\Http\Controllers\IndustryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/industry', [IndustryController::class, 'all']);
Route::get('/industry/{industry}', [IndustryController::class, 'getById']);
Route::post('/industry', [IndustryController::class, 'store']);
Route::post('/industry/{industry}', [IndustryController::class, 'update']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
