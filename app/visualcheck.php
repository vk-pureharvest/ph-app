<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visualcheck extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','sample' ,'quality','order_variety','appearance','batch','weight','packaging',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'visualchecks';
    public static function getVisualChecks(){
        $records = DB::table('visualchecks')->select("site_name","date_added","product_type","sample" ,"quality","order_variety","appearance","batch","weight","packaging")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
