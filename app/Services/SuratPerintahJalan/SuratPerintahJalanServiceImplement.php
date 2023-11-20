<?php

namespace App\Services\SuratPerintahJalan;

use LaravelEasyRepository\Service;
use App\Repositories\SuratPerintahJalan\SuratPerintahJalanRepository;

class SuratPerintahJalanServiceImplement extends Service implements SuratPerintahJalanService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(SuratPerintahJalanRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function findByIdPenggunaBus($id)
    {
        return $this->mainRepository->findByIdPenggunaBus($id);
    }
}
