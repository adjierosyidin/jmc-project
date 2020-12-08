<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstProvinsi extends Model
{
    protected $table = 'mst_provinsi';
    protected $primaryKey= 'kd_provinsi';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kd_provinsi', 'provinsi'
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

    public function kabupatens(){
        return $this->hasMany(MstKabupaten::class, 'kd_kabupaten', 'kd_kabupaten');
    }
}
