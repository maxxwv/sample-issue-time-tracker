<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueComponent extends Model
{
    protected $table = "issue_components";
    protected $fillable = [
        'issue', 'component',
    ];
}
