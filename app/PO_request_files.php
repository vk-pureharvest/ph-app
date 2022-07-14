<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PO_request_files extends Model
{
    protected $fillable = [
        'porequest_id','file',
    ];
 
    function user(){
        return $this->belongsto('App\User');
    }
}
