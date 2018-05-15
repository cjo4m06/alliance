<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'user_id', 'job', 'level', 'attack', 'hit', 'ac'
    ];

    const ROYAL = 'royal';
    const KNIGHT = 'knight';
    const ELF = 'elf';
    const WIZARD = 'wizard';
    
    const JOBS = [
        self::ROYAL => '王族',
        self::KNIGHT => '騎士',
        self::ELF => '妖精',
        self::WIZARD => '法師',
    ];
}
