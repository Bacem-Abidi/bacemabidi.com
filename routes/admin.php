<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Livewire\Admin\Dashboard;

/*================ ADMIN ================*/
// Auth Routes
Auth::routes(); // This adds all auth routes (login, register, logout, etc.)

// Manual logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Admin pages
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard'); // Redirect to /admin/dashboard
    });
    Route::get('/dashboard', [Dashboard::class, 'render'])->name('admin.dashboard');

    // Projects Routes
    Route::prefix('/projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    });
});
