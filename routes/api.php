<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/industry', [IndustryController::class, 'all']);
Route::get('/profile/{user}', [ProfileController::class, 'getByUserId']);
Route::get('/industry/{industry}', [IndustryController::class, 'getById']);
Route::post('/industry', [IndustryController::class, 'store']);
Route::put('/industry/{industry}', [IndustryController::class, 'update']);
Route::post('/offer', [OfferController::class, 'store']);
Route::put('/offer/{offer}', [OfferController::class, 'update']);
Route::post('/skill', [SkillController::class, 'store']);
Route::get('/skill/{match}', [SkillController::class, 'getSkillByUserId']);
Route::post('/education', [EducationController::class, 'store']);
Route::post('/experience', [ExperienceController::class, 'store']);
Route::delete('/skill/{skill}', [SkillController::class, 'delete']);
Route::delete('/education/{education}', [EducationController::class, 'delete']);
Route::delete('/experience/{experience}', [ExperienceController::class, 'delete']);
Route::delete('/offer/{offer}', [OfferController::class, 'delete']);
Route::put('/skill/{skill}', [SkillController::class, 'update']);
Route::put('/experience/{experience}', [ExperienceController::class, 'update']);
Route::put('/education/{education}', [EducationController::class, 'update']);
Route::post('/match', [MatchesController::class, 'store']);
Route::get('/match/{user}', [MatchesController::class, 'getMatchesByUserId']);
Route::get('/match/offer/{user}', [MatchesController::class, 'getMatchesByOfferId']);
Route::get('/offer/unmatched/{user}', [OfferController::class, 'getUnmatchedOffers']);
Route::get('/job/{user}', [OfferController::class, 'getByUserId']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/login', [ApiAuthController::class, 'login']);
    Route::post('/register', [ApiAuthController::class, 'register']);
});
resolve(UrlGenerator::class)->forceScheme('https');
