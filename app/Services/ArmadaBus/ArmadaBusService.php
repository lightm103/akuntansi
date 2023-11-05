<?php

namespace App\Services\ArmadaBus;

use LaravelEasyRepository\BaseService;

interface ArmadaBusService extends BaseService{
    public function getBusAvailable();
}
