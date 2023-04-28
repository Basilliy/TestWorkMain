<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = 'visitors';
    protected $fillable = [
        'ip_address',
        'user_agent',
        'view_date',
        'page_url',
        'views_count'
    ];

    public $timestamps = false;
}