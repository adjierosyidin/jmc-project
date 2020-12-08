<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTree extends Model
{
    public $table = 'user_tree';
    public $incrementing = false;

    protected $fillable = [
        'ancestor',
        'descendant',
        'depth',
    ];
}
