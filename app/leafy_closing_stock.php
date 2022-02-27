<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leafy_closing_stock extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'product_type','total_kgs',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'leafy_closing_stocks';
    public static function leafy_closing_stock(){
        $records = DB::table('leafy_closing_stocks')->select("site_name","date_added","product_type","total_kgs")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
