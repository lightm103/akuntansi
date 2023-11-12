<?php

namespace App\Services\TransaksiTravel;

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

    // Define your custom methods :)
}
