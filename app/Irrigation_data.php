<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Irrigation_data extends Model
{
    
    protected $fillable = [
        'user_id','site_name','date_added', 'metric','rad_sum','v_70','v_80','v_90','v_100','v_110','v_120','v_130','v_140','v_150',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'irrigation_datas';
    public static function getirrigationData(){
        $records = DB::table('irrigation_datas')->select("site_name","date_added","metric", "rad_sum","v_70","v_80","v_90","v_100","v_110","v_120","v_130","v_140","v_150")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
