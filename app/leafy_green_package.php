<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class leafy_green_package extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','total_prod','class1_prod','no_of_lines','no_of_gutters','comments',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'leafy_green_packages';
    public static function getleafy_green_packed(){
        $records = DB::table('leafy_green_packages')->select("site_name","date_added","product_type","total_prod","class1_prod","no_of_lines","no_of_gutters","comments")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}

