<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','username','parent_id','is_verified'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activated',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function information(){
        return $this->hasOne('App\User_info');
    }

    public function history(){
        return $this->hasMany('App\History');
    }

    public function devices(){
        return $this->belongsToMany('App\Device','device_user','user_id','device_id');
    }

    public function groups(){
        return $this->belongsToMany('App\Group','group_user','group_id','user_id');
    }

    public function friends(){
        return $this->belongsToMany('App\User','friends_users','user_id','friend_id')->with('information')->withPivot('confirmed')->where('confirmed',1);
    }

    public function friendsFromOther(){
        return $this->belongsToMany('App\User','friends_users','friend_id','user_id')->with('information')->withPivot('confirmed')->where('confirmed',1);
    }

    public function friendsRequests(){
        return $this->belongsToMany('App\User','friends_users','friend_id','user_id')->with('information')->withPivot('confirmed')->where('confirmed',0);
    }

    public function requested(){
        return $this->belongsToMany('App\User','friends_users','user_id','friend_id')->with('information')->withPivot('confirmed')->where('confirmed',0);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

}
