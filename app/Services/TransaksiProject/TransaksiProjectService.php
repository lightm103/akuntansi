<?php

namespace App\Services\TransaksiProject;

use LaravelEasyRepository\BaseService;

interface TransaksiProjectService extends BaseService{

    public function getGroupByProject();
    public function getByProjectId($id);
}
