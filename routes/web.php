<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Show all tasks
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Add new task
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Mark task as complete
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Delete task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
