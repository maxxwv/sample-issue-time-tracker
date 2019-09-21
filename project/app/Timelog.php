<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
    protected $fillabl = [
        'issue', 'user', 'seconds',
    ];
}
