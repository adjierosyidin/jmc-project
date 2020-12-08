<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    public $table = 'dompet';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id_user',
        'amount',
        'created_at',
        'updated_at',
    ];
}
