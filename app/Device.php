<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function users(){
    	return $this->belongsToMany('App\User','device_user','device_id','user_id');
    }
}
