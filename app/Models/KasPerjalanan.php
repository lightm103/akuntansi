<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasPerjalanan extends Model
{
    use HasFactory;
    protected $table = 'kas_perjalanan';
    protected $guarded = [
        'id'
    ];

    public function suratPerintahJalan()
    {
        return $this->belongsTo(SuratPerintahJalan::class, 'surat_perintah_jalan', 'id');
    }
}
