<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HutangUangController;
use App\Http\Controllers\PemesanBusController;
use App\Http\Controllers\HutangBarangController;
use App\Http\Controllers\PenggunaanBusController;
use App\Http\Controllers\SuratPerintahJalanController;
use App\Http\Controllers\PengeluaranController; // Jangan lupa untuk meng-import PengeluaranController

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

Route::get('/', [DashboardController::class, 'index']);

Route::resource('projects', ProjectController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Transaksi
Route::get('transaksi', [\App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('transaksi/debit', [\App\Http\Controllers\TransaksiController::class, 'pemasukan'])->name('transaksi.debit');
Route::post('transaksi/kredit', [\App\Http\Controllers\TransaksiController::class, 'pengeluaran'])->name('transaksi.kredit');
Route::resource('pengeluaran', PengeluaranController::class);
Route::post('transaksi/eksport', [\App\Http\Controllers\TransaksiController::class, 'exportByMonth'])->name('transaksi.eksport');
Route::delete('transaksi/{transaksi}', [\App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');

// Route Kas
Route::get('kas', [\App\Http\Controllers\KasTransaksiController::class, 'index'])->name('kas.index');
Route::get('kas/detail-project/{id}', [\App\Http\Controllers\KasTransaksiController::class, 'detailProject'])->name('kas.project.detail');
Route::get('kas/detail-travel/{id}', [\App\Http\Controllers\KasTransaksiController::class, 'detailTravel'])->name('kas.travel.detail');

Route::resource('penggunaanbus', PenggunaanBusController::class);

Route::resource('hutang', HutangBarangController::class);
Route::resource('pemesanbus', PemesanBusController::class);
Route::get('get-pemesan/{id}', [PemesanBusController::class, 'getPemesanById']);
Route::resource('hutanguang', HutangUangController::class);


Route::get('document-spj/{id}', [SuratPerintahJalanController::class, 'show'])->name('spj.show');
Route::post('document-spj/store/', [SuratPerintahJalanController::class, 'store'])->name('spj.store');
Route::put('document-spj/update/{id}', [SuratPerintahJalanController::class, 'update'])->name('spj.update');
