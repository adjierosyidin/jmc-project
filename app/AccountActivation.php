<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountActivation extends Model
{
    public $table = 'account_activations';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'biaya_join',
        'nama_bank',
        'no_rek',
        'nama_pemilik',
        'no_wa',
        'created_at',
        'updated_at',
    ];
}
