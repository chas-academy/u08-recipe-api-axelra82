<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [AuthController::class, 'userProfile']);

    // Recipe list CRUD
    Route::get('/recipelists', [RecipeListController::class, 'index']);
    Route::get('/recipelist/{id}', [RecipeListController::class, 'show']);
    Route::post('/recipelist', [RecipeListController::class, 'store']);
    Route::put('/recipelist/{id}', [RecipeListController::class, 'update']);
    Route::delete('/recipelist/{id}', [RecipeListController::class, 'destroy']);
});
