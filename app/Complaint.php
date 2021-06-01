<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date_received', 'customer_name','complaint_category','complaint_sub_category','product_type',
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    

}
