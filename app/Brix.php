<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brix extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date_received', 'product_type','BRIX',
    ];
    
    function user(){
        return $this->belongsto('App\User');
    }
}
