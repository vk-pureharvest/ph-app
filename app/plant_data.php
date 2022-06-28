<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plant_data extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'product_type','metric','pl_1','pl_2','pl_3','pl_4','pl_5',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'plant_datas';
    public static function getirrigationData(){
        $records = DB::table('plant_datas')->select("site_name","date_added","product_type", "metric","pl_1","pl_2","pl_3","pl_4","pl_5")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
