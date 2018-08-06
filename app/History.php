<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
