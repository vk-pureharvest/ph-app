<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_ful_ksa extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','ordered_kg','delivered_kg','forecast_kg','harvest_kg','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'order_ful_ksas';
    public static function getProduction(){
        $records = DB::table('order_ful_ksas')->select("site_name","date_added", "product_type","ordered_kg","delivered_kg",
        "forecast_kg","harvest_kg","comment")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
