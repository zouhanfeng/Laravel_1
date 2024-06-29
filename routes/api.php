<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\YoutuberController;
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
Route::post('register', [AuthController::class, 'register']);

Route::post('login',  [AuthController::class, 'login']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    // 查詢所有
    Route::get('channels', [ChannelsController::class, 'api_teams']);
    // 修改指定
    Route::patch('channels', [ChannelsController::class, 'api_update']);
    // 刪除指定
    Route::delete('channels', [ChannelsController::class, 'api_delete']);
    // 查詢所有
    Route::get('youtubers', [YoutuberController::class, 'api_players']);
    // 修改指定
    Route::patch('youtubers', [YoutuberController::class, 'api_update']);
    // 刪除指定
    Route::delete('youtubers', [YoutuberController::class, 'api_delete']);
});
