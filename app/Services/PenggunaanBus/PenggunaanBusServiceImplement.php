<?php

namespace App\Services\PenggunaanBus;

use LaravelEasyRepository\Service;
use App\Repositories\PenggunaanBus\PenggunaanBusRepository;

class PenggunaanBusServiceImplement extends Service implements PenggunaanBusService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PenggunaanBusRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
