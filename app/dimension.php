<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dimension extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','date_added', 'product_type','length','width','weight',
    ];
    
    function user(){
        return $this->belongsto('App\User');
    }
}
