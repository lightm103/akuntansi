<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmadaBus extends Model
{
    use HasFactory;

    protected $table = 'armada_buses';
    protected $guarded = ['id'];

    public function penggunanBus()
    {
        return $this->hasMany(PenggunaanBus::class, 'armada_id', 'id');
    }
}
