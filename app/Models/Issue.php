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
	public function commentsCount()
	    {
		return $this->hasOne('App\Models\Comment')
		            ->selectRaw('count(*) as aggregate')
		            ->groupBy('issue_id');
	}
	
	public function getCommentsCountAttribute()
	    {
		// 		if relation is not loaded already, let's do it first
        if ( ! array_key_exists('commentsCount', $this->relations)) 
            $this->load('commentsCount');
        $related = $this->getRelation('commentsCount');
        // then return the count directly
        return ($related) ? (int) $related->aggregate : 0;
    }
    // public function setStartDateAttribute($date){
    //     $this->attributes['start_date'] = Carbon::parse($date);
    // }
    // public function setClosetDateAttribute($date){
    //     $this->attributes['close_date'] = Carbon::parse($date);
    // }
    public function getAllIssues(){
         return $this            
            ->leftJoin('severities', 'severities.id', '=', 'issues.severity_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'issues.status_id')
            ->leftJoin('projects', 'projects.id', '=', 'issues.project_id')
            ->leftJoin('users AS responsibles', 'responsibles.id', '=', 'issues.responsible_id')
            ->leftJoin('users AS creators', 'creators.id', '=', 'issues.creator_id')
            ->leftJoin('users AS executors', 'executors.id', '=', 'issues.executor_id')
            ->select(\DB::raw(
                'issues.*,
		                severities.title AS severity_title,
		                statuses.title AS status_title,
		                projects.title AS project_title,               
		                responsibles.name AS responsible_name,               
		                responsibles.login AS responsible_login,                               
		                creators.login AS creator_login,
		                creators.name AS creator_name,               
		                executors.login AS executor_login,
		                executors.name AS executor_name,
		                (SELECT count(1) FROM comments WHERE issue_id = issues.id) AS comment_count'    
            )              
            );
    }
}
