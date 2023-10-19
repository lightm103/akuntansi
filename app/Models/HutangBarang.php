<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangBarang extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nama_barang', 
        'total_uang', 
        'nama_toko', 
        'status'
    ];

}
