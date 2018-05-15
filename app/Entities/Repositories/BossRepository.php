<?php

namespace App\Entities\Repositories;

use App\Entities\Boss;
use App\Packages\Repository\Repository;

class BossRepository extends Repository
{
    public function __construct(Boss $boss)
    {
        $this->model = $boss;
    }
}
