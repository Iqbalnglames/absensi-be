<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('employer', RegisterController::class);
Route::get('register-new', [RegisterController::class, 'showNew']);
Route::post('mapel', [MapelController::class, 'register']);
Route::get('mapel', [MapelController::class, 'showMapel']);
Route::post('login', [AuthController::class, 'auth']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::apiResource('kehadiran', AttendanceController::class);