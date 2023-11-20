<?php

namespace App\Repositories\SuratPerintahJalan;

use LaravelEasyRepository\Repository;

interface SuratPerintahJalanRepository extends Repository{

    public function findByIdPenggunaBus($id);
}
