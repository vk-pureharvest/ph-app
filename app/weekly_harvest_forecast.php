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
    'user_id','week_num','year','product_type','kgs_harvested','first_quality',
];

function user(){
    return $this->belongsto('App\User');
}

}
