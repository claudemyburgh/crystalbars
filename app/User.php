<?php

namespace App;

use App\UserSocials;
use Designbycode\RolesAndPermissions\Traits\HasPermissionsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function social()
    {
        return $this->hasMany(UserSocials::class);
    }



    /**
     * Check to see if has social login account
     * @param  [type]  $service [description]
     * @return boolean          [description]
     */
    public function hasSocialLinked($service)
    {
        return (bool) $this->social->where('service', $service)->count();
    }


}
