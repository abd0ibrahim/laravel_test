<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function roles(){

        return $this->hasMany('App\Role');

//        return $this->hasMany('App\Role', 'user_roles', 'role_id');

    }
}
