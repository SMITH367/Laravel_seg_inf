<?php

use App\Http\Controllers\todosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
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

Route::post("/register",[UsersController::class,"register"]);
Route::post("/login",[UsersController::class,"login"]);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('profile', [UsersController::class, 'userProfile']);
    Route::post('logout', [UsersController::class, 'logout']);
});

Route::apiResource('/todo',todosController::class);

