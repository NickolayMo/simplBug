<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'title',
        'description',
        'severity_id',
        'status_id',
        'project_id',
        'creator_id',
        'executor_id',
        'responsible_id',
        'date_expected',
        'time_expected'
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
    


}
