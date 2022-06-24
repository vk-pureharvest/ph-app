<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quality_patrol_image extends Model
{
    protected $fillable = [
        'quality_id','image',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
}
