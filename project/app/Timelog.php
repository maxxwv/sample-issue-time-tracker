<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
    protected $fillable = [
        'issue', 'user', 'seconds',
    ];
}
