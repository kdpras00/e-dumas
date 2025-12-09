<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
// Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Pengaduan Routes
    Route::get('/pengaduan/create', [\App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [\App\Http\Controllers\PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{id}', [\App\Http\Controllers\PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::post('/pengaduan/{id}/response', [\App\Http\Controllers\PengaduanController::class, 'storeResponse'])->name('pengaduan.response');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Routes accessible by Admin and Kepala Kelurahan (Read Only for Kepala)
        Route::middleware(['role:Admin,Kepala'])->group(function() {
            Route::get('/users', [\App\Http\Controllers\AdminController::class, 'indexUsers'])->name('users.index');
            Route::get('/petugas', [\App\Http\Controllers\AdminController::class, 'indexPetugas'])->name('petugas.index');
            // Route for Admin to manage/view all complaints (List View)
            Route::get('/kelola-pengaduan', [\App\Http\Controllers\AdminController::class, 'indexPengaduan'])->name('pengaduan.index');
            Route::get('/laporan', [\App\Http\Controllers\AdminController::class, 'indexLaporan'])->name('laporan.index');
        });

        // Routes accessible ONLY by Admin
        Route::middleware(['role:Admin'])->group(function() {
            // User Management
            Route::get('/users/create', [\App\Http\Controllers\AdminController::class, 'createUser'])->name('users.create');
            Route::post('/users', [\App\Http\Controllers\AdminController::class, 'storeUser'])->name('users.store');
            Route::get('/users/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edit');
            Route::put('/users/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
            Route::delete('/users/{id}', [\App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
            Route::post('/users/{id}/reset-password', [\App\Http\Controllers\AdminController::class, 'resetPassword'])->name('users.reset_password');
            
            // Category Management
            Route::get('/categories', [\App\Http\Controllers\AdminController::class, 'indexCategories'])->name('categories.index');
            Route::get('/categories/create', [\App\Http\Controllers\AdminController::class, 'createCategory'])->name('categories.create');
            Route::post('/categories', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('categories.store');
            Route::get('/categories/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editCategory'])->name('categories.edit');
            Route::put('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('categories.update');
            Route::delete('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'destroyCategory'])->name('categories.destroy');

            // RW Management
            Route::get('/rw', [\App\Http\Controllers\AdminController::class, 'indexRw'])->name('rw.index');
            Route::get('/rw/create', [\App\Http\Controllers\AdminController::class, 'createRw'])->name('rw.create');
            Route::post('/rw', [\App\Http\Controllers\AdminController::class, 'storeRw'])->name('rw.store');
            Route::get('/rw/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editRw'])->name('rw.edit');
            Route::put('/rw/{id}', [\App\Http\Controllers\AdminController::class, 'updateRw'])->name('rw.update');
            Route::delete('/rw/{id}', [\App\Http\Controllers\AdminController::class, 'destroyRw'])->name('rw.destroy');

            // RT Management
            Route::get('/rt', [\App\Http\Controllers\AdminController::class, 'indexRt'])->name('rt.index');
            Route::get('/rt/create', [\App\Http\Controllers\AdminController::class, 'createRt'])->name('rt.create');
            Route::post('/rt', [\App\Http\Controllers\AdminController::class, 'storeRt'])->name('rt.store');
            Route::get('/rt/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editRt'])->name('rt.edit');
            Route::put('/rt/{id}', [\App\Http\Controllers\AdminController::class, 'updateRt'])->name('rt.update');
            Route::delete('/rt/{id}', [\App\Http\Controllers\AdminController::class, 'destroyRt'])->name('rt.destroy');

            // Petugas Management (Partial - Index is shared)
            Route::get('/petugas/create', [\App\Http\Controllers\AdminController::class, 'createPetugas'])->name('petugas.create');
            Route::post('/petugas', [\App\Http\Controllers\AdminController::class, 'storePetugas'])->name('petugas.store');
            Route::get('/petugas/{id}/edit', [\App\Http\Controllers\AdminController::class, 'editPetugas'])->name('petugas.edit');
            Route::put('/petugas/{id}', [\App\Http\Controllers\AdminController::class, 'updatePetugas'])->name('petugas.update');
            Route::delete('/petugas/{id}', [\App\Http\Controllers\AdminController::class, 'destroyPetugas'])->name('petugas.destroy');
            Route::post('/petugas/{id}/reset-password', [\App\Http\Controllers\AdminController::class, 'resetPasswordPetugas'])->name('petugas.reset_password');
        });
    });
});
