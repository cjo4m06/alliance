<?php

namespace App\Entities\Repositories;

use App\Entities\Loot;
use App\Packages\Repository\Repository;

class LootRepository extends Repository
{
    public function __construct(Loot $loot)
    {
        $this->model = $loot;
    }
}
