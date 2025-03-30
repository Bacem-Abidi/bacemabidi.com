<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;

/*================ PUBLIC ================*/
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Projects Routes
    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects');
        Route::get('/3d-projects', [ProjectController::class, 'blender'])->name('projects/3d-projects');
        Route::get('/coding-projects', [ProjectController::class, 'coding'])->name('projects/coding-projects');
        Route::get('/photography', [ProjectController::class, 'photography'])->name('projects/photography');
        Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
    });

    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog');
        Route::get('/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
    });

    Route::get('/about', function () {
        return view('pages.frontend.about');
    })->name('about');

    Route::get('/contact', function () {
        return view('pages.frontend.contact');
    })->name('contact');

    // Legal
    Route::get('/legal/privacy-policy', function () {
        return view('pages.legal.privacy-policy');
    })->name('legal/privacy-policy');

    Route::get('/legal/terms-of-service', function () {
        return view('pages.legal.terms-of-service');
    })->name('legal/terms-of-service');
});

