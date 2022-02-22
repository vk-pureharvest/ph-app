<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class truck_tracker extends Model
{
  
    protected $fillable = [
        'user_id','site_name','date_added', 'truck_num','no_of_pallets','customer','kgs_loaded',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'truck_trackers';
    public static function getTruckTracker(){
        $records = DB::table('truck_trackers')->select("site_name","date_added","truck_num","no_of_pallets","customer","kgs_loaded")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
