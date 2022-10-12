<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

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
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/project', [ProjectController::class, 'store']);
Route::post('/task', [TaskController::class, 'store']);
Route::post('/updatetaskorder', [TaskController::class, 'updatetaskorder']);

