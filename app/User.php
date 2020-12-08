<?php

namespace App;

use App\UserRole;
use App\UserTree;
use App\UserBank;
use App\MstKecamatan;
use App\MstKabupaten;
use App\MstProvinsi;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 
        'name', 
        'username', 
        'email', 
        'telp',
        'alamat',
        'kd_provinsi',
        'kd_kabupaten',
        'kd_kecamatan',
        'referrer',
        'password', 
        'id_role', 
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function hasRole($role)
    {
        return User::where('id_role', $role)->get();
    } */

    public function role() {
        return $this->belongsTo(UserRole::class, 'id_role' , 'id');
    }

    public function kecamatan()
    {   
        return $this->belongsTo(MstKecamatan::class, 'kd_kecamatan', 'kd_kecamatan');
    }

    public function kabupaten()
    {   
        return $this->belongsTo(MstKabupaten::class, 'kd_kabupaten', 'kd_kabupaten');
    }

    public function provinsi()
    {   
        return $this->belongsTo(MstProvinsi::class, 'kd_provinsi', 'kd_provinsi');
    }

    public function titik()
    {
        return $this->hasMany(UserTree::class, 'ancestor', 'id');
    }

    public function rekening()
    {
        return $this->belongsTo(UserBank::class, 'id' , 'id_user');
    }
}
