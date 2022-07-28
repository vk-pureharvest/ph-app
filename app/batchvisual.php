<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batchvisual extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','sample' ,'batch_code','expiry_date',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'batchvisuals';
    public static function getBatchVisuals(){
        $records = DB::table('batchvisuals')->select("site_name","date_added","product_type","sample","batch_code","expiry_date")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
