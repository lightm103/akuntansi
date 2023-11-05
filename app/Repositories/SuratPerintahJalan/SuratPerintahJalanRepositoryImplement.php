<?php

namespace App\Repositories\SuratPerintahJalan;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\SuratPerintahJalan;

class SuratPerintahJalanRepositoryImplement extends Eloquent implements SuratPerintahJalanRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(SuratPerintahJalan $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
