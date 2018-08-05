<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'user_info';
    protected $fillable = [
        'first_name', 'last_name','gender','user_id','birthday','home_address','contact_number','avatar_url'
    ];
    public static $rules = array(
		'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'gender' => 'required',
        'address' => 'required|string|max:255',
        'contact' => 'required|string|min:11',
        'birthday' => 'required',

	);
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
