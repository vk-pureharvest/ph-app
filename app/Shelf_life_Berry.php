<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shelf_life_Berry extends Model
{
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'user_id','site_name','testing_date','harvest_date','product_type','days_old','good','bad','remarks',
];

function user(){
    return $this->belongsto('App\User');
}

protected $table = 'shelf_life_berries';
public static function getShelfLifeBerry(){
    $records = DB::table('shelf_life_berries')->select("site_name","testing_date","harvest_date","product_type","days_old","good","bad","remarks")->orderBy('testing_date','desc')->get()->toArray();
    return $records; 
}
}