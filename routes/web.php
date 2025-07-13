<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks',[TaskController::class,'store']);
Route::put('/tasks/{task}/toggle',[TaskController::class, 'update']);
Route::delete('/task/{task}',[TaskController::class,'destroy']);
