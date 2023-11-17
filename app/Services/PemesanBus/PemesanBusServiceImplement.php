<?php

namespace App\Services\PemesanBus;

use LaravelEasyRepository\Service;
use App\Repositories\PemesanBus\PemesanBusRepository;

class PemesanBusServiceImplement extends Service implements PemesanBusService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PemesanBusRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
