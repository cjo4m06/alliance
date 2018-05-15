<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
       'name', 'manager_id'
    ];
}
