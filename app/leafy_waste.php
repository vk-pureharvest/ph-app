<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leafy_waste extends Model
{
  
    protected $fillable = [
        'user_id','site_name','date_added', 'product_type','total_kgs','comments',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'leafy_wastes';
    public static function leafy_waste(){
        $records = DB::table('leafy_wastes')->select("site_name","date_added","product_type","total_kgs","comments")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
