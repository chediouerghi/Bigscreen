&lt;?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SurveyController as AdminSurveyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\SurveyController as PublicSurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\Admin\DashboardController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::apiResource('admin/surveys', AdminSurveyController::class)->middleware('auth:api');
Route::apiResource('admin/surveys.questions', QuestionController::class)->middleware('auth:api');
Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware('auth:api');

Route::get('surveys', [PublicSurveyController::class, 'index']);
Route::post('surveys/{survey}/responses', [ResponseController::class, 'store']);
