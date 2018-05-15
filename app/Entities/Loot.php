<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Loot extends Model
{
    protected $fillable = [
        'user_id', 'item_id', 'boss_id', 'date'
    ];
}
