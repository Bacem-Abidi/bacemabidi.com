<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

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

    // Blog Routes
    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog');
        Route::get('/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
    });

    // Contact Routes
    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact');
        Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');
    });

    // Legal Routes
    Route::prefix('/legal')->group(function () {
        Route::get('/privacy-policy', function () {
            return view('pages.legal.privacy-policy');
        })->name('legal.privacy-policy');

        Route::get('/terms-of-service', function () {
            return view('pages.legal.terms-of-service');
        })->name('legal.terms-of-service');
    });

    Route::get('/about', function () {
        return view('pages.frontend.about');
    })->name('about');
});

