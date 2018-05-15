<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $table = 'boss';

    protected $fillable = [
        'number', 'name', 'note', 'rebirth_time', 'estimated_time', 'is_alert', 'times'
    ];
}
