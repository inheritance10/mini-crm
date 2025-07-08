<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

// Auth routes
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
});

// JWT Auth gerektiren tüm route’lar
Route::middleware('auth:api')->group(function () {
    // Employee - RESTful (apiResource)
    Route::apiResource('employees', EmployeeController::class);

    // Task - RESTful
    Route::post('tasks', [TaskController::class, 'store']);
    Route::put('tasks/{id}', [TaskController::class, 'update']);
    Route::get('employees/{employeeId}/tasks', [TaskController::class, 'getTasks']);
    Route::patch('tasks/{id}/complete', [TaskController::class, 'markComplete']);
});
