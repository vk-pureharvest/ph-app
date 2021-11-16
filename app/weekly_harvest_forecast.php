<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weekly_harvest_forecast extends Model
{
     /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'user_id','site_name','week_num','product_name','kgs_harvested',
];

function user(){
    return $this->belongsto('App\User');
}

}
