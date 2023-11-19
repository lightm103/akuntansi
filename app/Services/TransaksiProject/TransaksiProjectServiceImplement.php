<?php

namespace App\Services\TransaksiProject;

use Illuminate\Support\Facades\Log;
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

    public function getGroupByProject()
    {
        try {
            return $this->mainRepository->getGroupByProject();
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }
}
