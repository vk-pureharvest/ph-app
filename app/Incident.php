<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reported_by','date_received','title','type_of_incident','emp_name','emp_title','location','sp_loc',
         'addn_people','witnesses','incident_desc','root_cause','action_exec','action_plan',
    ];

}
