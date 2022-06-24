<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quality_patrol extends Model
{ 
    protected $fillable = [
        'user_id','site_name','date_added','category','sub_category','details',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
}
