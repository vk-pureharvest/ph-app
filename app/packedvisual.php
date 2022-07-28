<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packedvisual extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','sample' ,'weight','quality','specs',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'packedvisuals';
    public static function getTomatoesPacked(){
        $records = DB::table('packedvisuals')->select("site_name","date_added","product_type","sample","weight","quality","specs")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
