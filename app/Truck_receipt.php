<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck_receipt extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'vehicle_reg','truck_size','no_of_pallets','supplier','item','qty_received','dn_qty','time_entered','time_left',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }

    
    protected $table = 'truck_receipts';
    public static function getTruckReceipt(){
        $records = DB::table('truck_receipts')->select("site_name","date_added","vehicle_reg","truck_size","no_of_pallets","supplier","item","qty_received","dn_qty","time_entered","time_left")->orderBy('date_added','desc')->get()->toArray();
        return $records; 
    }
}
