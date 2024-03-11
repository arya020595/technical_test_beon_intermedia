<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OccupantController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DuesTypeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OccupantHouseController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('occupants', OccupantController::class);
Route::resource('houses', HouseController::class);
Route::resource('payments', PaymentController::class);
Route::resource('duestypes', DuesTypeController::class);
Route::resource('expenses', ExpenseController::class);
Route::resource('occupanthouses', OccupantHouseController::class);
