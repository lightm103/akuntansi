<?php

namespace App\Services\TransaksiProject;

use LaravelEasyRepository\Service;
use App\Repositories\TransaksiProject\TransaksiProjectRepository;

class TransaksiProjectServiceImplement extends Service implements TransaksiProjectService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TransaksiProjectRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
