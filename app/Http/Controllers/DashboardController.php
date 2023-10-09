<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $totalUangProyek = Project::sum(DB::raw('uang_muka + uang_pinjaman'));
    $totalPengeluaran = Pengeluaran::sum('jumlah');

    return view('dashboard.index', compact('totalUangProyek', 'totalPengeluaran'));
}

}
