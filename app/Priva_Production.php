<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Priva_Production extends Model
{ 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'date','crop_id','production',
   ];

   protected $table = 'priva_production';
   public static function getPrivaProduction(){
       $records = DB::table('priva_production')->select("date","crop", "production")->orderBy('date','desc')->get()->toArray();
       return $records; 
   }

}
