<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuSetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UsersController;


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

Route::get('/menuset', 'MenuSetController@index')->name('menuset.index');

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/menuset', [App\Http\Controllers\MenuSetController::class, 'index'])->name('menuset.index');
        Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
        // Tambahkan rute lain sesuai kebutuhan Anda
    });
});

Route::resource('kategori', KategoriController::class);


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}/update', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}/delete', [KategoriController::class, 'delete'])->name('kategori.delete'); // Definisi route untuk aksi penghapusan


Route::resource('menuset', MenuController::class);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard/pengguna', [UsersController::class, 'index'])->name('pengguna.index');
    Route::get('/dashboard/pengguna/create', [UsersController::class, 'create'])->name('pengguna.create'); // Define route for creating a new user
    Route::post('/dashboard/pengguna', [UsersController::class, 'store'])->name('pengguna.store');
    Route::get('/dashboard/pengguna/{id}/edit', [UsersController::class, 'edit'])->name('pengguna.edit');
    Route::put('/dashboard/pengguna/{id}', [UsersController::class, 'update'])->name('pengguna.update');
    Route::delete('/dashboard/pengguna/{id}', [UsersController::class, 'destroy'])->name('pengguna.destroy');
});

Route::middleware(['auth', 'checkrole:admin,chef'])->group(function () {
    Route::get('/menuset', [MenuController::class, 'index'])->name('menuset.index');
    Route::get('/menuset/create', [MenuController::class, 'create'])->name('menuset.create');
    Route::post('/menuset', [MenuController::class, 'store'])->name('menuset.store');
    Route::get('/menuset/{id}/edit', [MenuController::class, 'edit'])->name('menuset.edit');
    Route::put('/menuset/{id}', [MenuController::class, 'update'])->name('menuset.update');
    Route::delete('/menuset/{id}', [MenuController::class, 'destroy'])->name('menuset.destroy');
});

Route::get('/menu-of-the-week', [MenuController::class, 'showMenuOfTheWeek']);