<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'uang_muka', 'uang_pinjaman', 'is_completed'];

    public function getTotalAttribute(){
        return $this->uang_muka + $this->uang_pinjaman;
    }

    public function transaksiProject()
    {
        return $this->hasMany(Transaksi::class);
    }
}
