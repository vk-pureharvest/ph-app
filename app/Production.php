<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Production extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'start_time','end_time','workstation','ppl_num','prod_boxes','product_type','harvest_date','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'productions';
    public static function getProduction(){
        $records = DB::table('productions')->select("site_name","comment","created_at")->orderBy('created_at','desc')->get()->toArray();
        return $records; 
    }
}
