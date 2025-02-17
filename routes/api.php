<?php

use App\Http\Controllers\TaskController;

// Route group for API tasks
Route::prefix('tasks')->group(function () {
    // Get all tasks
    Route::get('/', [TaskController::class, 'apiIndex']);  // GET /api/tasks

    // Get a specific task by ID
    Route::get('{task}', [TaskController::class, 'apiShow']);  // GET /api/tasks/{task}

    // Create a new task
    Route::post('/', [TaskController::class, 'apiStore']);  // POST /api/tasks

    // Update a specific task by ID
    Route::put('{task}', [TaskController::class, 'apiUpdate']);  // PUT /api/tasks/{task}

    // Delete a task by ID
    Route::delete('{task}', [TaskController::class, 'apiDestroy']);  // DELETE /api/tasks/{task}
});
// Route::prefix('tasks')->group(function () {
//     Route::get('/', [TaskController::class, 'apiIndex']);  // GET /api/tasks
//     Route::get('{task}', [TaskController::class, 'apiShow']);  // GET /api/tasks/{task}
//     Route::post('/', [TaskController::class, 'apiStore']);  // POST /api/tasks
//     Route::put('{task}', [TaskController::class, 'apiUpdate']);  // PUT /api/tasks/{task}
//     Route::delete('{task}', [TaskController::class, 'apiDestroy']);  // DELETE /api/tasks/{task}
// });