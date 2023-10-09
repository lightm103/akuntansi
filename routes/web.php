<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
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

// Rute untuk projects
Route::resource('projects', ProjectController::class);

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk pengeluaran
Route::resource('pengeluaran', PengeluaranController::class);

Route::resource('penggunaanbus', PenggunaanBusController::class);