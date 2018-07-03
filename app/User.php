<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','username','parent_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activated','token'
    ];

    public function information(){
        return $this->hasOne('App\User_info');
    }

    public function devices(){
        return $this->belongsToMany('App\Device','device_user','user_id','device_id');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','user_group','user_id','group_id');
    }

    public function friends(){
        return $this->hasMany('App\Friend','user_id');
    }
    public function friendsAdded(){
        return $this->hasMany('App\Friend','friend_id');
    }
}
