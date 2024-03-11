<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DuesTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OccupantHouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::resource('users', UserController::class);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::resource('occupants', OccupantController::class);
    Route::resource('houses', HouseController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('duestypes', DuesTypeController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('occupanthouses', OccupantHouseController::class);
});
