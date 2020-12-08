<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    public $table = 'user_banks';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kd_bank',
        'nama_pemilik',
        'no_rek',
        'id_user',
        'created_at',
        'updated_at',
    ];

    public function bank() {
        return $this->belongsTo(MstBank::class, 'kd_bank', 'kd_bank');
    }
}
