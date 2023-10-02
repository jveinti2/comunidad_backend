<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\AuthApiController;
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



Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthApiController::class, 'authenticate']);
});
Route::prefix('/noticias')->group(function () {
    Route::get('/', [NoticiasController::class, 'listData']);
});
