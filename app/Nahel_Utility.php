<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nahel_Utility extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','site_name','date_added','electra_1','electra_2','reject_water','supply_water_1','supply_water_2','irrigation_water','ground_water'
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    
    
    protected $table = 'nahel_utilities';
    public static function getNahel_Utility(){
        $records = DB::table('nahel_utilities')->select("site_name","date_added","electra_1","electra_2","reject_water","supply_water_1","supply_water_2","irrigation_water","ground_water")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}

