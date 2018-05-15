<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'user_id', 'begin_date', 'end_date', 'times'
    ];
}
