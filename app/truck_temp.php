<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class truck_temp extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','truck_num','truck_temp','driver_name','product_name','truck_clean','comments',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'truck_temps';
    public static function getTruckTemp(){
        $records = DB::table('truck_temps')->select("site_name","date_added", "truck_num","truck_temp","driver_name","product_name","truck_clean","comments")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }    
}
