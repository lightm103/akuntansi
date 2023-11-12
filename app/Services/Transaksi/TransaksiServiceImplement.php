<?php

namespace App\Services\Transaksi;

use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\Service;
use App\Repositories\Transaksi\TransaksiRepository;

class TransaksiServiceImplement extends Service implements TransaksiService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TransaksiRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getTransaksiByGroup()
    {
        try {
            return $this->mainRepository->getTransaksiByGroup();
        } catch (\Exception $exception) {
            Log::error($exception);
            return null;
        }
    }
}
