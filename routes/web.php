<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Livewire\Admin\Dashboard;


/*================ PUBLIC ================*/
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Projects Routes
    Route::prefix('projects')->group(function () {
        Route::get('/', function () {
            return view('pages.frontend.projects');
        })->name('projects');

        Route::get('/3d-projects', function () {
            return view('pages.frontend.projects.3d');
        })->name('projects/3d-projects');

        Route::get('/coding-projects', function () {
            return view('pages.frontend.projects.coding');
        })->name('projects/coding-projects');

        Route::get('/photography', function () {
            return view('pages.frontend.projects.photography');
        })->name('projects/photography');

        Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
    });
});

// Projects





Route::get('/blog', function () {
    return view('pages.frontend.blog');
})->name('blog');

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
