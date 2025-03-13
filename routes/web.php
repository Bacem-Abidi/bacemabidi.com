<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Livewire\Admin\Dashboard;

// Admin
Auth::routes(); // This adds all auth routes (login, register, logout, etc.)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard'); // Redirect to /admin/dashboard
    });
    Route::get('/dashboard', [Dashboard::class, 'render'])->name('admin.dashboard');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects
Route::get('/projects', function () {
    return view('pages.frontend.projects');
})->name('projects');

Route::get('/projects/3d-projects', function () {
    return view('pages.frontend.projects.3d');
})->name('projects/3d-projects');

Route::get('/projects/coding-projects', function () {
    return view('pages.frontend.projects.coding');
})->name('projects/coding-projects');

Route::get('/projects/photography', function () {
    return view('pages.frontend.projects.photography');
})->name('projects/photography');

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
