<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogContentController;
use App\Http\Controllers\Admin\ProjectCaseStudyController;
use App\Http\Controllers\Admin\PhotographyController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfilePhotoController;
use Laravel\Fortify\Http\Controllers\PasswordController;

/*================ ADMIN ================*/
// Auth Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group( function() {
    Auth::routes(['reset' => false,'register'=>false]); // This adds all auth routes (login, register, logout, etc.)

    // Manual logout route
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login');
    })->name('logout');
});


// Admin pages
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard'); // Redirect to /admin/dashboard
    });
    Route::get('/dashboard', [AdminController::class, 'render'])->name('admin.dashboard');

    Route::delete('/user/profile-photo', [ProfilePhotoController::class, 'destroy'])->name('user-profile-photo.destroy');
    Route::put('/user/password', [PasswordController::class, 'update'])
    ->name('password.update');
    // Projects Routes
    Route::prefix('/projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/', [ProjectController::class, 'store'])->name('admin.projects.store');

        Route::prefix('/{project}')->group(function () {
            Route::get('/', [ProjectController::class, 'show'])->name('admin.projects.show');
            Route::put('/', [ProjectController::class, 'update'])->name('admin.projects.update');
            Route::get('/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
            Route::delete('/', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

            Route::post('/upload-image', [ProjectCaseStudyController::class, 'uploadImage'])->name('admin.projects.upload-image');
            Route::prefix('/case-study')->group(function () {
                Route::get('/', [ProjectCaseStudyController::class, 'index'])->name('admin.projects.case-study');
                Route::post('/save', [ProjectCaseStudyController::class, 'save'])->name('admin.projects.case-study.save');
            });
        });
    });

    // Blog Route
    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/', [BlogController::class, 'store'])->name('admin.blog.store');

        Route::prefix('/{blog}')->group(function () {
            Route::get('/', [BlogController::class, 'show'])->name('admin.blog.show');
            Route::put('/', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::get('/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
            Route::delete('/', [BlogController::class, 'destroy'])->name('admin.blog.destroy');

            Route::post('/upload-image', [BlogContentController::class, 'uploadImage'])->name('admin.blog.upload-image');
            Route::prefix('/content')->group(function () {
                Route::get('/', [BlogContentController::class, 'index'])->name('admin.blog.content');
                Route::post('/save', [BlogContentController::class, 'save'])->name('admin.blog.content.save');
            });
        });
    });

    // Tags routes
    Route::prefix('tags')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tags.index');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tags.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tags.store');

        Route::prefix('/{tag}')->group(function () {
            Route::get('/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
            Route::put('/', [TagController::class, 'update'])->name('admin.tags.update');
            Route::delete('/', [TagController::class, 'destroy'])->name('admin.tags.destroy');
        });
    });

    // Photography routes
    Route::prefix('photography')->group(function () {
        Route::get('/', [PhotographyController::class, 'index'])->name('admin.photography.index');
        Route::get('/upload', [PhotographyController::class, 'upload'])->name('admin.photography.upload');
        Route::post('/', [PhotographyController::class, 'store'])->name('admin.photography.store');

        Route::prefix('/{image}')->group(function () {
            Route::get('/edit', [PhotographyController::class, 'edit'])->name('admin.photography.edit');
            Route::put('/', [PhotographyController::class, 'update'])->name('admin.photography.update');
            Route::delete('/', [PhotographyController::class, 'destroy'])->name('admin.photography.destroy');
        });
    });

    // Setting routes
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'render'])->name('admin.settings');
        Route::put('/update', [SettingsController::class, 'update'])->name('admin.settings.update');
    });

});
