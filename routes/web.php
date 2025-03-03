<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects
Route::get('/projects', function () {
    return view('pages.projects');
})->name('projects');

Route::get('/projects/3d-projects', function () {
    return view('pages.projects.3d');
})->name('projects/3d-projects');

Route::get('/projects/coding-projects', function () {
    return view('pages.projects.coding');
})->name('projects/coding-projects');

Route::get('/projects/photography', function () {
    return view('pages.projects.photography');
})->name('projects/photography');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// Legal
Route::get('/legal/privacy-policy', function () {
    return view('pages.legal.privacy-policy');
})->name('legal/privacy-policy');

Route::get('/legal/terms-of-service', function () {
    return view('pages.legal.terms-of-service');
})->name('legal/terms-of-service');

