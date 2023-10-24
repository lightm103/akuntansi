<?php

use App\Http\Controllers\PemesanBusController;
use App\Http\Controllers\SuratPerintahJalanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HutangBarangController;
use App\Http\Controllers\PengeluaranController; // Jangan lupa untuk meng-import PengeluaranController
use App\Http\Controllers\PenggunaanBusController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', ProjectController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Transaksi
Route::get('transaksi', [\App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('transaksi/debit', [\App\Http\Controllers\TransaksiController::class, 'pemasukan'])->name('transaksi.debit');
Route::post('transaksi/kredit', [\App\Http\Controllers\TransaksiController::class, 'pengeluaran'])->name('transaksi.kredit');
Route::resource('pengeluaran', PengeluaranController::class);

Route::resource('penggunaanbus', PenggunaanBusController::class);

Route::resource('hutang', HutangBarangController::class);
Route::resource('pemesanbus', PemesanBusController::class);
Route::get('get-pemesan/{id}', [PemesanBusController::class, 'getPemesanById']);

Route::get('document-spj/{id}', [SuratPerintahJalanController::class, 'show'])->name('spj.show');
Route::post('document-spj/store/', [SuratPerintahJalanController::class, 'store'])->name('spj.store');
