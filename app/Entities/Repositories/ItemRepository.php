<?php

namespace App\Entities\Repositories;

use App\Entities\Item;
use App\Packages\Repository\Repository;

class ItemRepository extends Repository
{
    public function __construct(Item $item)
    {
        $this->model = $item;
    }

    public function getItems($keywords = null, $paginate = true)
    {
        $query = $this->model->newQuery();

        if ($keywords) {
            $keywords = explode(' ', $keywords);
            foreach ($keywords as $keyword) {
                $query->where('name', 'like', "%{$keyword}%");
            }
        }

        return $paginate ? $query->paginate(10) : $query->get();
    }

    public function createItem($data)
    {
        return $this->model->create($data);
    }
}
