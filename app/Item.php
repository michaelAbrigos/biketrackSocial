<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	PUBLIC $timestamps = FALSE;
  protected $table = 'item';
    protected $fillable = ['description', 'sell_price','cost_price'];
    protected $primaryKey = 'item_id';
}
