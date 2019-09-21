<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'name', 'id',
    ];

    /**
     * Create the one-to-many relationship between components and issues
     *
     * @return boolean
     */
    public function issues(){
        return $this->belongsToMany('App\Issue', 'issue_components');
    }
}
