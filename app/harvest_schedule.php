<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class harvest_schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name','crop_type','num_of_harvests', 'total_rows','buffer','sat_harvest','sun_harvest','mon_harvest','tue_harvest','wed_harvest','thu_harvest',
    ];

    function user(){
        return $this->belongsto('App\User');
    }

    
}
