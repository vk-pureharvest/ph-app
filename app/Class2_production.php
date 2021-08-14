<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Class2_production extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','class_type','production',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'Class2_productions';
    public static function getClass2Production(){
        $records = DB::table('Class2_productions')->select("site_name","date_added","product_type","class_type","production")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}

