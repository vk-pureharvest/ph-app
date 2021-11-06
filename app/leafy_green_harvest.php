<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class leafy_green_harvest extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'line_num','product_type','no_of_gutters','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'leafy_green_harvests';
    public static function getleafy_green_harvest(){
        $records = DB::table('leafy_green_harvests')->select("site_name","date_added","line_num","product_type","no_of_gutters","comment")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
