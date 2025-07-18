<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/survey', [SurveyController::class, 'store']);
use App\Http\Controllers\AdminController;

Route::get('/survey/{token}', [SurveyController::class, 'show']);

Route::prefix('administration')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/questions', [AdminController::class, 'questions']);
    Route::get('/responses', [AdminController::class, 'responses']);
});
