<?php

use App\Http\Controllers\TasksController;
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

Route::get('/tasks', [TasksController::class, 'getTasks']);
Route::post('/save-tasks', [TasksController::class, 'saveTask']);
Route::post('/update-save-tasks', [TasksController::class, 'updateTask']);
Route::post('/delete/{id}', [TasksController::class, 'deleteTask']);
