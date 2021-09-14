<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Incident extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reported_by','date_received','title','type_of_incident','site_name','emp_name','emp_title','location','sp_loc',
         'addn_people','witnesses','incident_desc','root_cause','action_exec','action_plan',
    ];

    protected $table = 'incidents';
    public static function getIncident(){
        $records = DB::table('incidents')->select("reported_by","date_received","title","type_of_incident","site_name","emp_name","emp_title","location","sp_loc",
                                                  "addn_people","witnesses","incident_desc","root_cause","action_exec","action_plan")->orderBy('date_received','desc')->get()->toArray();
        return $records; 
    }
}
