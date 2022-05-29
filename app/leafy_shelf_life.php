<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class leafy_shelf_life extends Model
{
  
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'user_id','site_name','testing_date', 'day_of_testing','date_harvested','product_type',
       'smell','texture','cracks','wrinkles','color','spots','dryness','crunch','remarks'
   ];

   function user(){
       return $this->belongsto('App\User');
   }

   protected $table = 'leafy_shelf_lives';
   public static function getLeafyShelfLifeTest(){
       $records = DB::table('shelf_life_tests')->select("site_name","testing_date", "day_of_testing","date_harvested","product_type","smell","texture","cracks","wrinkles","color","spots","dryness","crunch","remarks")->orderBy('product_type','day_of_testing','desc')->get()->toArray();
       return $records; 
   }

}
