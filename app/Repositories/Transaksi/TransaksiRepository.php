<?php

namespace App\Repositories\Transaksi;

use LaravelEasyRepository\Repository;

interface TransaksiRepository extends Repository{

   public function getTransaksiByGroup();
}
