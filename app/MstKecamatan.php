<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstKecamatan extends Model
{
    protected $table = 'mst_kecamatan';
    protected $primaryKey= 'kd_kecamatan';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kd_kabupaten', 'kd_kecamatan', 'kecamatan'
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

    public function kabupaten() {
        return $this->belongsTo(MstKabupaten::class, 'kd_kabupaten', 'kd_kabupaten');
    }
}
