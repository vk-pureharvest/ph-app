<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Complaint extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','site_name','date_received', 'customer_name','complaint_category_1','complaint_category_2','complaint_sub_category','product_type','class','fin_impact','image','batch_code','quantity_returned','product_type_2',
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    
    
    protected $table = 'complaints';
    public static function getComplaint(){
        $records = DB::table('complaints')->select("site_name","date_received", "customer_name","complaint_category_1","complaint_category_2","complaint_sub_category","product_type","class","fin_impact","image")->orderBy('date_received','desc')->get()->toArray();
        return $records; 
    }

}
