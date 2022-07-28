<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receivedvisual extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','sample' ,'color','size','spots','fungus','wrinkles','softness',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'receivedvisuals';
    public static function getTomatoesReceived(){
        $records = DB::table('receivedvisuals')->select("site_name","date_added","product_type","sample","color","size","spots","fungus","wrinkles","softness")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
