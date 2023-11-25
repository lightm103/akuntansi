<?php

namespace App\Services\TransaksiTravel;

use LaravelEasyRepository\BaseService;

interface TransaksiTravelService extends BaseService{

    public function getGroupByProject();
    public function getByPemesanId($id);
}
