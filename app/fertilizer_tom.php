<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fertilizer_tom extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'metric','drip','drain',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'fertilizer_toms';
    public static function getFertilizerTomData(){
        $records = DB::table('fertilizer_toms')->select("site_name","date_added","product_type", "metric","drip","drain")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
