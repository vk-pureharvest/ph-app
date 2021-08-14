<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class packingqc extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added','product_type','total_kg','damage_reason','perc',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'packingqcs';
    public static function getPackingQC(){
        $records = DB::table('packingqcs')->select("site_name","date_added","product_type","total_kg","damage_reason","perc")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}

