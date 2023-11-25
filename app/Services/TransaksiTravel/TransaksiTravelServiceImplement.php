<?php

namespace App\Services\TransaksiTravel;

use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\Service;
use App\Repositories\TransaksiTravel\TransaksiTravelRepository;

class TransaksiTravelServiceImplement extends Service implements TransaksiTravelService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TransaksiTravelRepository $mainRepository)
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

    public function getByPemesanId($id)
    {
        try {
            return $this->mainRepository->getByPemesanId($id);
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }
}
