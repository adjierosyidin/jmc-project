<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $table = 'transaksi';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'id_user',
        'amount',
        'type',
        'status',
        'paid_by',
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user' , 'id');
    }
}
