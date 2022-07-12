<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO_request extends Model
{
    protected $fillable = [
        'user_id','requestor','supplier','account','request_date','amount','terms','comments',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'plant_datas';
    public static function getirrigationData(){
        $records = DB::table('plant_datas')->select("id","requestor","supplier","account","request_date","amount","terms","comments")->orderBy('request_num','desc')->get()->toArray();
        return $records; 
    }
}
