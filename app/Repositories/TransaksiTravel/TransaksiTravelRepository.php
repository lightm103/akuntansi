<?php

namespace App\Repositories\TransaksiTravel;

use LaravelEasyRepository\Repository;

interface TransaksiTravelRepository extends Repository{

    public function getGroupByProject();
}
