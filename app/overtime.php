<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class overtime extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'employee','reason','ot_requested','ot_granted','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'overtimes';
    public static function getOvertime(){
        $records = DB::table('overtimes')->select("site_name","date_added", "employee","reason","ot_requested","ot_granted","comment")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
