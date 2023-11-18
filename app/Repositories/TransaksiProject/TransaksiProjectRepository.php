<?php

namespace App\Repositories\TransaksiProject;

use LaravelEasyRepository\Repository;

interface TransaksiProjectRepository extends Repository{

    public function getGroupByProject();
}
