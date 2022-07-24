<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rejectedpile extends Model
{
    
    protected $fillable = [
        'user_id','site_name','date_added', 'check_type','product_type','weight','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'rejectedpiles';
    public static function getRejectedPile(){
        $records = DB::table('overtimes')->select("site_name","date_added", "check_type","product_type","weight","comment")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
