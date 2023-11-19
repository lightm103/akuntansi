<?php

namespace App\Repositories\PemesanBus;

use LaravelEasyRepository\Repository;

interface PemesanBusRepository extends Repository{

    public function getNotExistsRelation();
}
