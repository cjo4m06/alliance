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

    public function getMember($keywords, $paginate = true)
    {
        $query = $this->model->newQuery();

        $query->with(['roles']);

        $query->where('is_active', true);

        if ($keywords) {
            $keywords = explode(' ', $keywords);
            foreach ($keywords as $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('users.name', 'like', "%{$keyword}%");
                    $query->orWhereHas('roles', function ($query) use ($keyword) {
                        $query->where('roles.name', 'like', "%{$keyword}%");
                    });
                });
            }
        }

        $query->orderByDesc('is_manager');

        return $paginate ? $query->paginate(10) : $query->get();
    }
}
