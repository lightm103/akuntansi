<?php

namespace App\Services\SuratPerintahJalan;

use LaravelEasyRepository\BaseService;

interface SuratPerintahJalanService extends BaseService{

    public function findByIdPenggunaBus($id);
}
