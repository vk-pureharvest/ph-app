<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShelfLifeTest extends Model
{
  
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'user_id','site_name','testing_date', 'day_of_testing','date_harvested','product_type','color','color_rank','BRIX',
       'firmness','firmness_rank','smell_rank','weight','weight_rank','height','width','vine_quality','spots','wrinkles','fungus','quality_rank','remarks'
   ];

   function user(){
       return $this->belongsto('App\User');
   }

   protected $table = 'shelf_life_tests';
   public static function getShelfLifeTest(){
       $records = DB::table('shelf_life_tests')->select("site_name","testing_date", "day_of_testing","date_harvested","product_type","color","color_rank","BRIX","firmness","firmness_rank","smell_rank","weight","weight_rank","wrinkles","height","width","vine_quality","spots","fungus","quality_rank","remarks")->orderBy('product_type','day_of_testing','desc')->get()->toArray();
       return $records; 
   }

}
