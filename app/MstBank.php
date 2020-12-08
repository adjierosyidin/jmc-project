<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstBank extends Model
{
    public $table = 'mst_banks';
    protected $primaryKey = 'kd_bank';
    public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kd_bank',
        'nama_bank',
        'created_at',
        'updated_at',
    ];
}
