<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\PhotographyController;


Route::prefix('v1')->group(function () {
    // HomePage
    Route::get('/homepage', [HomeController::class, 'index']);
    Route::get('/info', [HomeController::class, 'info']);

    // Projects
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/featured', [ProjectController::class, 'featured']);
        Route::get('/{project:slug}', [ProjectController::class, 'show']); // Use slug instead of ID
    });

    // Blog
    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::get('/featured', [BlogController::class, 'featured']);
        Route::get('/{blog:slug}', [BlogController::class, 'show']); // Use slug instead of ID
    });

    // Photography routes
    Route::prefix('photography')->group(function () {
        Route::get('/', [PhotographyController::class, 'index']);
    });

});
