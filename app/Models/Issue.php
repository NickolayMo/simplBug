<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Issue extends Model
{
    protected $dates = [
        'start_date',
        'close_date'      
    ];
    protected $fillable = [
        'title',
        'description',
        'severity_id',
        'status_id',
        'project_id',
        'creator_id',
        'executor_id',
        'responsible_id',
        'start_date',
        'close_date',
        'elapsed_time',
        'expected_time'
    ];

    public function severity(){
        return $this->belongsTo('App\Models\Severity');
    }
    
     public function status(){
        return $this->belongsTo('App\Models\Status');
    }
   
     public function project(){
        return $this->belongsTo('App\Models\Project');
    }
   
     public function creator(){
        return $this->belongsTo('App\Models\User', 'creator_id');
    }
    public function executor(){
        return $this->belongsTo('App\Models\User', 'executor_id');
    }
    public function responsible(){
        return $this->belongsTo('App\Models\User', 'responsible_id');
    }
    /*
    public function getAllIssues(){
        return $this->join('users', 'users.id', '=', 'issues.responsible_id');
    }
    */
     public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function setStartDateAttribute($date){
        $this->attributes['start_date'] = Carbon::parse($date);
    }
    public function setClosetDateAttribute($date){
        $this->attributes['close_date'] = Carbon::parse($date);
    }


}
