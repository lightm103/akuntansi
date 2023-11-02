<?php

namespace App\Services\Project;

use LaravelEasyRepository\Service;
use App\Repositories\Project\ProjectRepository;

class ProjectServiceImplement extends Service implements ProjectService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ProjectRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
