<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = [
        'user_id','site_name','date_added', 'start_time','end_time','workstation','ppl_num','prod_boxes','product_type',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
}
