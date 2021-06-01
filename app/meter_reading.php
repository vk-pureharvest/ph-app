<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meter_reading extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date_added', 'metric','reading_type','value',
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    
}
