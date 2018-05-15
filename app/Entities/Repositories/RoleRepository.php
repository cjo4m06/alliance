<?php

namespace App\Entities\Repositories;

use App\Entities\Role;
use App\Packages\Repository\Repository;

class RoleRepository extends Repository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getRolesByUserId($userId)
    {
        $query = $this->model->newQuery();

        $query->where('user_id', $userId);

        return $query->get();
    }

    public function createRole($data)
    {
        return $this->model->create($data);
    }
}
