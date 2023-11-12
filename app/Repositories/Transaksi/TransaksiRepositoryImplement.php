<?php

namespace App\Repositories\Transaksi;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Transaksi;

class TransaksiRepositoryImplement extends Eloquent implements TransaksiRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Transaksi $model)
    {
        $this->model = $model;
    }

    public function getTransaksiByGroup()
    {
        return $this->model->with('transaksiTravel')->get()->groupBy('transaksiTravel.pemesan_bus_id');
    }
}
