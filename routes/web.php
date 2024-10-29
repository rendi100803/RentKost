<?php

use App\Http\Controllers\KostController;
use App\Http\Controllers\WEB\Auth\LoginController;
use App\Http\Controllers\WEB\Auth\LogoutController;
use App\Http\Controllers\WEB\Auth\RegisterController;
use App\Http\Controllers\WEB\Auth\ResetPasswordController;
use App\Http\Controllers\WEB\Auth\NewPasswordController;
use App\Http\Controllers\WEB\DashboardController;
use App\Http\Controllers\WEB\Admin\User\UserMemberController;
use App\Http\Controllers\WEB\Admin\Wilayah\WilayahController;
use App\Http\Controllers\WEB\Auth\VerificationController;
use App\Http\Controllers\WEB\ReservasiContoller;
use Illuminate\Support\Facades\Route;

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



Route::get('/',  [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/home/produk', [DashboardController::class, 'produk']);
Route::middleware(['guest'])->group(function () {
    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'index'])
            ->name('index');
        Route::post('/', [LoginController::class, 'process'])
            ->name('process');
    });

    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])
            ->name('index');
        Route::post('/', [RegisterController::class, 'process'])
            ->name('process');
    });

    Route::prefix('reset-password')->name('reset-password.')->group(function () {
        Route::get('/', [ResetPasswordController::class, 'index'])
            ->name('index');
        Route::post('/', [ResetPasswordController::class, 'process'])
            ->name('process');
    });

    Route::prefix('new-password')->name('new-password.')->group(function () {
        Route::get('/', [NewPasswordController::class, 'index'])
            ->name('index');
        Route::post('/', [NewPasswordController::class, 'process'])
            ->name('process');
    });

    Route::get('/verification', VerificationController::class)
        ->name('verification');
});

Route::middleware(['auth'])->name('web.')->group(function () {
    Route::get('/logout', LogoutController::class)
        ->name('auth.logout');
});

Route::middleware(['autentikasi'])->group(function () {
    Route::group(['middleware' => ['can:admin']], function () {
        Route::prefix('admin')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::prefix('wilayah')->group(function () {
                Route::get('/getKota', [WilayahController::class, 'getKota']);
                Route::get('/getKecamatan', [WilayahController::class, 'getKecamatan']);
            });
            Route::prefix('pengguna')->group(function () {
                Route::resource('member', UserMemberController::class);
                Route::post('member/{id}/verify', [UserMemberController::class, 'verify'])->name('member.verify');
                Route::put('member/{member}/update', [UserMemberController::class, 'update'])->name('member.update');
            });
            Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        });
    });
    Route::group(['middleware' => ['can:member']], function () {
        Route::middleware(['auth', 'check.member.status'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'member'])->name('member');
            Route::get('/mitra/info', [DashboardController::class, 'info'])->name('info');
            Route::get('/mitra/reservasi', [DashboardController::class, 'transaksi'])->name('transaksi');
            Route::get('/mitra/statistik', [DashboardController::class, 'statistik'])->name('statistik');

            // ROUTE KELOLA PRODUK KOST
            Route::get('/kelola-kost', [KostController::class, 'index'])->name('member.produk');
            Route::get('/kelola-kost/create', [KostController::class, 'create'])->name('member.produk.create');
            Route::post('/kelola-kost/store', [KostController::class, 'store'])->name('member.produk.store');
            Route::get('/kelola-kost/edit/{id}', [KostController::class, 'edit'])->name('member.produk.edit');
            Route::put('/kelola-kost/update/{id}', [KostController::class, 'update'])->name('member.produk.update');
            Route::delete('/kelola-kost/delete/{id}', [KostController::class, 'destroy'])->name('member.produk.destroy');
        });

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('registrasi', [DashboardController::class, 'register_member'])->name('home.registrasi');
        Route::post('registrasi', [DashboardController::class, 'register_member_submit'])->name('home.registrasi.submit');
        Route::get('kost', [DashboardController::class, 'kost'])->name('kost');
        Route::get('/room/{judul}', [DashboardController::class, 'produk'])->name('produk');
        Route::get('/history-reservasi', [DashboardController::class, 'reservasi_success'])->name('reservasi.success');
        Route::post('/reservasi', [DashboardController::class, 'reservasi'])->name('reservasi.store');
        Route::get('cart', [DashboardController::class, 'cart'])->name('cart');
    });
});
