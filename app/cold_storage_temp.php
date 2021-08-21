<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cold_storage_temp extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','temp_recorded','quality_controller','shift_leader','remarks',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'cold_storage_temps';
    public static function getColdStorageTemp(){
        $records = DB::table('cold_storage_temps')->select("site_name","date_added", "temp_recorded","quality_controller","shift_leader","remarks")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }    
}
