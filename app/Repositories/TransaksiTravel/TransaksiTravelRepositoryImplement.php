<?php

namespace App\Repositories\TransaksiTravel;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\TransaksiTravel;

class TransaksiTravelRepositoryImplement extends Eloquent implements TransaksiTravelRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(TransaksiTravel $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
