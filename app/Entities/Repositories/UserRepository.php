<?php

namespace App\Entities\Repositories;

use App\Entities\User;
use App\Packages\Repository\Repository;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function registerByAccountPassword($data)
    {
        return $this->model->create($data);
    }
}
