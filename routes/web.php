<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    
    Route::get('/', [HomeController::class, 'index']);


Route::get('/menu', [MenuController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index']);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard/user', [UserController::class, 'index']);
});

Route::middleware(['auth', 'role:chef'])->group(function () {
    Route::get('/dashboard/chef', [ChefController::class, 'index']);
});

Route::middleware('ensure_role:admin')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index']);
});

Route::middleware('ensure_role:user')->group(function () {
    Route::get('/dashboard/user', [AdminController::class, 'index']);
});

Route::middleware('ensure_role:chef')->group(function () {
    Route::get('/dashboard/chef', [AdminController::class, 'index']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
