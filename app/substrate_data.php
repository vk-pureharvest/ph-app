<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class substrate_data extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'compartment','metric','pl_1','pl_2','pl_3',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'substrate_datas';
    public static function getSubstrateData(){
        $records = DB::table('substrate_datas')->select("site_name","date_added","compartment", "metric","pl_1","pl_2","pl_3")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
