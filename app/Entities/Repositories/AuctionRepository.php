<?php

namespace App\Entities\Repositories;

use App\Entities\Auction;
use App\Packages\Repository\Repository;

class AuctionRepository extends Repository
{
    public function __construct(Auction $auction)
    {
        $this->model = $auction;
    }
}
