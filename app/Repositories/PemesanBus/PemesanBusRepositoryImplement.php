<?php

namespace App\Repositories\PemesanBus;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\PemesanBus;

class PemesanBusRepositoryImplement extends Eloquent implements PemesanBusRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(PemesanBus $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
