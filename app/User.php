<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function District()
    {
    }

    public function lichsu_tracuus()
    {
        return $this->hasMany('App\Lichsu_Tracuu','user_id', 'id');
    }

    public function wish_lists()
    {
        return $this->hasMany('App\Wish_List','user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\City','city_id', 'id');
    }


}
