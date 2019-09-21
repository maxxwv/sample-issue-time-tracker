<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueComponent extends Model
{
    /**
     * Laravel concatenates table names alphabetically, which is not
     * how I named the table. So I'm going to force it here, yo.
     * @var string
     */
    protected $table = "issue_components";
    protected $fillable = [
        'issue', 'component',
    ];
}
