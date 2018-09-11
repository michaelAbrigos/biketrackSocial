<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members(){
    	return $this->belongsToMany('App\User','group_user','group_id','user_id');
    }

    public function addGroupMembers(User $user){
        return $this->members()->attach($user->id);
    }
}
