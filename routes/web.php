<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuSetController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Chef_ProfileController;
use App\Http\Controllers\RegistrasiChefController;
use App\Http\Controllers\ChefProfileController;
use App\Http\Controllers\ReservationHistoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\orderAdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/home', function () {
    return view('app');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



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
    Route::get('/reservation/history', [ReservationHistoryController::class, 'index'])->name('reservation.history');
    Route::post('/reservation/history/delete', [ReservationHistoryController::class, 'delete'])->name('reservation.history.delete');

    Route::prefix('dashboard')->group(function () {
        Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna.index');
        Route::get('/menuset', [App\Http\Controllers\MenuSetController::class, 'index'])->name('menuset.index');
        Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/ChefProfile', [ChefProfileController::class, 'index'])->name('ChefProfile.index');
        // Tambahkan rute lain sesuai kebutuhan Anda
    });
});

Route::resource('kategori', KategoriController::class);


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{kategori}/update', [KategoriController::class, 'update'])->name('kategori.update');
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

Route::get('/contact-us', function () {
    return view('contactus');
})->name('contactus');

Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan halaman pengelolaan profil chef
    Route::get('/Chefprofile', [Chef_ProfileController::class, 'index'])->name('Chefprofile.index');

    // Menampilkan formulir edit profil koki
    Route::get('/Chefprofile/edit', [Chef_ProfileController::class, 'edit'])->name('Chefprofile.edit');

    // Mengupdate profil koki
    Route::put('/Chefprofile/{chefProfile}', [Chef_ProfileController::class, 'update'])->name('Chefprofile.update');
});

Route::middleware(['auth', 'checkrole:chef'])->group(function () {
    Route::get('/menu-of-the-week', [MenuController::class, 'showMenuOfTheWeek']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/registrasiChef', [RegistrasiChefController::class, 'index'])->name('registrasiChef.index');
    Route::post('/dashboard/registrasiChef', [RegistrasiChefController::class, 'store'])->name('registrasiChef.store');
});

Route::get('/reservation/first', 'ReservationController@showFirst')->middleware('auth');
Route::get('/reservation.index', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation.index');
Route::get('/reservation', [App\Http\Controllers\ReservationController::class, 'index'])->middleware('check.user.session');
Route::get('/reservation/first', [App\Http\Controllers\ReservationController::class, 'showFirst'])->middleware('check.user.session');
Route::get('/reservation/first', [App\Http\Controllers\ReservationController::class, 'showFirst'])->name('reservation.first');
Route::post('/reservation/first/date', [App\Http\Controllers\ReservationController::class, 'setDate'])->middleware('check.user.session');
Route::post('reservation/first/date', [App\Http\Controllers\ReservationController::class, 'setDate'])->name('reservation.setDate');
Route::post('reservation/first/set-date', [App\Http\Controllers\ReservationController::class, 'setDate'])->name('reservation.setDate');
Route::post('/reservation/first/chooseTable', [App\Http\Controllers\ReservationController::class, 'chooseTable'])->middleware('check.user.session');
Route::post('/reservation/first/decide', [App\Http\Controllers\ReservationController::class, 'decide'])->middleware('check.user.session');
Route::post('/reservation/first/decide', [ReservationController::class, 'decide'])->name('reservation.first.decide');
Route::get('/reservation/second', [ReservationController::class, 'showSecond'])->name('reservation.second');
Route::post('/reservation/secondSave', [App\Http\Controllers\ReservationController::class, 'saveContactInfo'])->middleware('check.user.session');
Route::get('/reservation/third', [App\Http\Controllers\ReservationController::class, 'showThird'])->name('reservation.third');
Route::post('/reservation/third', [App\Http\Controllers\ReservationController::class, 'confirmReservation'])->name('confirmReservation');
Route::post('reservation/first/choose', [ReservationController::class, 'choose'])->name('reservation.choose');
Route::get('/reservation/success', [ReservationController::class, 'success'])->name('reservation.success');
Route::post('/reservation/first/decide', [ReservationController::class, 'decide'])->name('reservation.first.decide');
Route::post('/saveContactInfo', [ReservationController::class, 'saveContactInfo'])->name('saveContactInfo');
Route::get('/history/meja', [ReservationHistoryController::class, 'index'])->name('reservhistory');
Route::get('/history.reservhistory', [App\Http\Controllers\ReservationHistoryController::class, 'index'])->name('history.reservhistory');

Route::get('/admin/reservadmin', [ReservAdminController::class, 'index'])->name('admin.reservadmin');
Route::post('/admin/reservadmin/accept', [ReservAdminController::class, 'accept'])->name('reservations.accept');
Route::post('/admin/reservadmin/reject', [ReservAdminController::class, 'reject'])->name('reservations.reject');

Route::get('order/index', [App\Http\Controllers\orderController::class, 'index'])->name('order.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/orders/search', [OrderController::class, 'search'])->name('orders.search');
Route::post('/orders/delete', [OrderController::class, 'deleteOrder'])->name('orders.delete');
Route::post('/orders/confirm', [OrderController::class, 'confirmOrder'])->name('orders.confirm');
Route::get('/order/history', [OrderController::class, 'history'])->name('order.history');
Route::post('/order/add', [OrderController::class, 'addToCart'])->name('order.add');
Route::post('/order/addToCart', [OrderController::class, 'addToCart'])->name('order.addToCart');

Route::get('/order/{id}', [OrderController::class, 'details'])->name('order.details');