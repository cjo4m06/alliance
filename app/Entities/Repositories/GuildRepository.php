<?php

namespace App\Entities\Repositories;

use App\Entities\Guild;
use App\Packages\Repository\Repository;

class GuildRepository extends Repository
{
    public function __construct(Guild $guild)
    {
        $this->model = $guild;
    }

    public function getAllGuild()
    {
        $query = $this->model->newQuery();

        return $query->get();
    }
}
