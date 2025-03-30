<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ProjectController;


Route::prefix('v1')->group(function () {
    // Projects
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/featured', [ProjectController::class, 'featured']);
        Route::get('/{project:slug}', [ProjectController::class, 'show']); // Use slug instead of ID
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::get('/featured', [BlogController::class, 'featured']);
        Route::get('/{blog:slug}', [BlogController::class, 'show']); // Use slug instead of ID
    });
});
