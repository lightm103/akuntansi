<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'jumlah', 'keterangan'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
