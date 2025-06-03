<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TasksController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/sign-up', [AuthController::class, 'signUp']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tasks', [TasksController::class, 'store']);
    Route::get('/tasks', [TasksController::class, 'index']);
    Route::get('/tasks/find/{id}', [TasksController::class, 'findOne']);
    Route::patch('/task/{id}/status', [TasksController::class, 'updateStatus']);
    Route::patch('/task/{id}', [TasksController::class, 'update']);
    Route::delete('/task/{id}', [TasksController::class, 'delete']);
    Route::get('/tasks/status/{status}', [TasksController::class, 'filterByStatus']);
});