<?php

namespace App\Repositories\TransaksiProject;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\TransaksiProject;

class TransaksiProjectRepositoryImplement extends Eloquent implements TransaksiProjectRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(TransaksiProject $model)
    {
        $this->model = $model;
    }

    public function getGroupByProject()
    {
        return $this->model->get()->groupBy('projects_id');
    }
}
