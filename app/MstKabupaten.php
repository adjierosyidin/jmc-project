<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstKabupaten extends Model
{
    protected $table = 'mst_kabupaten';
    protected $primaryKey= 'kd_kabupaten';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kd_provinsi', 'kd_kabupaten', 'kabupaten'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:d-m-Y H:i:s',
    ];

    public function provinsi() {
        return $this->belongsTo(MstProvinsi::class, 'kd_provinsi', 'kd_provinsi');
    }

    public function kecamatans() {
        return $this->hasMany(MstKecamatan::class, 'kd_kecamatan', 'kd_kecamatan');
    }
}
