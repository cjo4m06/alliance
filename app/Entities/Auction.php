<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = [
        'user_id', 'loot_id', 'bidder_id', 'bid_increment', 'bid_now', 'reserve_price', 'deadline_date', 'is_public'
    ];
}
