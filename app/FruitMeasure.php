<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FruitMeasure extends Model
{ 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'user_id','site_name','date_received', 'row_num','product_type','BRIX','color','weight','length','width',
   ];

   function user(){
       return $this->belongsto('App\User');
   }
}
