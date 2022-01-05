<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class leafy_green_package extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','class','product_type','box_weight','no_of_punnets','no_of_boxes',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'leafy_green_packages';
    public static function getleafy_green_packed(){
        $records = DB::table('leafy_green_packages')->select("site_name","date_added","class","product_type","box_weight","no_of_punnets","no_of_boxes")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}

