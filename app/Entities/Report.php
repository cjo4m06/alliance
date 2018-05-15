<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id', 'manaber_id', 'content', 'status', 'reply'
    ];

    const UNREAD = 'unread';
    const READ = 'read';
    const REPLY = 'reply';

    const STATUS = [
        self::UNREAD => '未讀',
        self::READ => '已讀',
        self::REPLY => '已回覆',
    ];
}
