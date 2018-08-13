<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    protected $table = 'user_info';
    protected $fillable = [
        'first_name', 'last_name','gender','user_id','birthday','address','contact_number','avatar_url','city','zip_code'
    ];
    public static $rules = array(
		'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'gender' => 'required',
        'address' => 'required|string|max:255',
        'contact' => 'required|string|min:11',
        'bday' => 'required',
        'city' => 'required',
        'zipcode' => 'required|max:4',

	);
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
