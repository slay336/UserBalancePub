<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperationController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/login/check", [LoginController::class, "check_logged_in"]);
Route::post("/login", [LoginController::class, "login"]);
Route::middleware("auth:sanctum")->post("/logout", [LoginController::class, "logout"]);
Route::middleware("auth:sanctum")->post("/balance", [BalanceController::class, "show"]);
Route::middleware("auth:sanctum")->post("/operations", [OperationController::class, "show"]);
