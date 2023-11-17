<?php

namespace App\Repositories\ArmadaBus;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ArmadaBus;

class ArmadaBusRepositoryImplement extends Eloquent implements ArmadaBusRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(ArmadaBus $model)
    {
        $this->model = $model;
    }

    public function getByStatus($status)
    {
        return $this->model->where('status_ketersediaan', $status)->get();
    }
}
