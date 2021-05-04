<?php

use App\Http\Controllers\EmploymentTypeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\UsersController;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'dsadas';
});
resolve(UrlGenerator::class)->forceScheme('https');
Route::resource('industry', IndustryController::class);
Route::resource('users', UsersController::class);
Route::resource('employment_type', EmploymentTypeController::class);
