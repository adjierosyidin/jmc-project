<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use SoftDeletes;

    public $table = 'user_roles';
    public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nm_role',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getUser()
    {
        return $this->hasMany(User::class, 'id', 'id_role');
    }
}
