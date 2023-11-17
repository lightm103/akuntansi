<?php

namespace App\Repositories\ArmadaBus;

use LaravelEasyRepository\Repository;

interface ArmadaBusRepository extends Repository{
    public function getByStatus($status);
}
