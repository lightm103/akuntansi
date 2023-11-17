<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProject extends Model
{
    use HasFactory;

    protected $table = 'transaksi_project';
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
