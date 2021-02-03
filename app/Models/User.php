<?php


namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract
{
    use HasApiTokens, Authenticatable, Authorizable;

    protected $hidden = ['password'];

    protected $table = "users";

    public function findForPassport($susername) {
        return $this->where('username', $susername)->first();
    }

    public function submissions () {
        return $this->hasMany('App\Models\Submission');
    }

    public function user_points () {
        return $this->hasMany('App\Models\UserPoint');
    }

    public function user_point () {
        return $this->hasOne('App\Models\VwUserPoint');
    }

}
