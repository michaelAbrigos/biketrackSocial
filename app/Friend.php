<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use Notifiable;

    protected $fillable = [
        'friend_id', 'user_id','confirmed'
    ];

    public function friendInfo(){
    	return $this->belongsTo('App\User','user_id');
    }
}
