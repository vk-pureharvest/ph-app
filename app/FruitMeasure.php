<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FruitMeasure extends Model
{ 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'user_id','site_name','date_received', 'row_num','product_type','BRIX','color_L','color_A','color_B','weight','length','width','pressure',
   ];

   function user(){
       return $this->belongsto('App\User');
   }

   protected $table = 'fruit_measures';
   public static function getFruitMeasure(){
       $records = DB::table('fruit_measures')->select("site_name","date_received", "row_num","product_type","BRIX","color_L","color_A","color_B","weight","length","width","pressure")->orderBy('date_received','desc')->get()->toArray();
       return $records; 
   }

}
