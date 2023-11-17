<?php

namespace App\Services\ArmadaBus;

use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\Service;
use App\Repositories\ArmadaBus\ArmadaBusRepository;

class ArmadaBusServiceImplement extends Service implements ArmadaBusService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ArmadaBusRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getBusAvailable()
    {
        try {
            return $this->mainRepository->getByStatus(true);
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }
}
