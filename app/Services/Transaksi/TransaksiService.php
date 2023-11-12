<?php

namespace App\Services\Transaksi;

use LaravelEasyRepository\BaseService;

interface TransaksiService extends BaseService{

    public function getTransaksiByGroup();
}
