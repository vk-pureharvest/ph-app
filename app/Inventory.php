<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Inventory extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'product_type','zone','unit','value','comment',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'inventories';
    public static function getInventory(){
        $records = DB::table('inventories')->select("site_name","date_added", "product_type","zone","unit","value","comment")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}