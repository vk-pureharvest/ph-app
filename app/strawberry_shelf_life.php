<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class strawberry_shelf_life extends Model
{
        /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'user_id','site_name','testing_date', 'day_of_testing','date_harvested','product_type',
    'class','color_L','color_A','color_B','color_rank','BRIX','firmness','firmness_rank',
    'weight','height','width','remarks',
];

function user(){
    return $this->belongsto('App\User');
}


};

 