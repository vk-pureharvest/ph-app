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
       'user_id','site_name','testing_date', 'harvest_date','product_type','BRIX','color_L','color_A','color_B','weight','length','width','pressure','remarks',
   ];

   function user(){
       return $this->belongsto('App\User');
   }

   protected $table = 'shelf_life_tests';
   public static function getShelfLifeTest(){
       $records = DB::table('shelf_life_tests')->select("site_name","testing_date", "harvest_date","product_type","BRIX","color_L","color_A","color_B","weight","length","width","pressure","remarks")->orderBy('testing_date','desc')->get()->toArray();
       return $records; 
   }

}
