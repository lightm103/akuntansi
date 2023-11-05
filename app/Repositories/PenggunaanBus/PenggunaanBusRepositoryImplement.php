<?php

namespace App\Repositories\PenggunaanBus;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\PenggunaanBus;

class PenggunaanBusRepositoryImplement extends Eloquent implements PenggunaanBusRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(PenggunaanBus $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
