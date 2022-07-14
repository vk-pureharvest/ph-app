<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO_request extends Model
{
    protected $fillable = [
        'user_id','requestor','supplier','account','request_date','amount','terms','comments','status','payment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
    
    protected $table = 'p_o_requests';
    public static function getPOData(){
        $records = DB::table('p_o_requests')->select("id","requestor","supplier","account","request_date","amount","status","payment","terms","comments")->orderBy('request_num','desc')->get()->toArray();
        return $records; 
    }
}
