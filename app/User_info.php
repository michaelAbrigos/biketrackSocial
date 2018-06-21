<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'user_info';
    protected $fillable = [
        'first_name', 'last_name','gender','user_id'
    ];
    public static $rules = array(
		'fname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'lname' => 'required|string|max:255',
        'gender' => 'required',
        'username' => 'required|string|max:255'
	);
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
