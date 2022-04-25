<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class alain_utility extends Model
{
    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','site_name','date_added','well_water_p1','well_water_p2','well_water_p3','well_water_p4','mixing_unit_1','mixing_unit_2','pad_wall_1','pad_wall_2','tap_water_3','tap_water_4','condensation','chiller','mixing_unit_50','mixing_unit_60','electric_meter_1','electric_meter_2','co2_leafy_green','co2_tomatoes'
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    
    
    protected $table = 'alain_utilities';
    public static function getAlAin_Utility(){
        $records = DB::table('alain_utilities')->select("site_name","date_added","well_water_p1","well_water_p2","well_water_p3","well_water_p4","mixing_unit_1","mixing_unit_2","pad_wall_1","pad_wall_2","tap_water_3","tap_water_4","condensation","chiller","mixing_unit_50","mixing_unit_60","electric_meter_1","electric_meter_2","co2_leafy_green","co2_tomatoes")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
