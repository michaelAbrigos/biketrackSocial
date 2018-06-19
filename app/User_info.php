<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'user_info';
    protected $fillable = [
        'first_name', 'last_name','gender','user_id'
    ];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
