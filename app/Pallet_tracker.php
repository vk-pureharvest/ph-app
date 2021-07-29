<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pallet_tracker extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'time_added','quality_check','weight_check','weight_entered','material_check','quality_controller','shift_leader','remarks',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'pallet_trackers';
    public static function getPallet_tracker(){
        $records = DB::table('pallet_trackers')->select("site_name","date_added", "time_added","quality_check","weight_check","weight_entered","material_check","quality_controller","shift_leader","remarks")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
