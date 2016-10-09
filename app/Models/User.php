<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

    protected $fillable = [
        'name',
        'login',
        'email',
        'password'       
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];

    
    public function getCreatedIssues(){
        return $this->hasMany('App\Models\Issues', 'creator_id');
    }
    public function getExecutorIssues(){
        return $this->hasMany('App\Models\Issues', 'executor_id');
    }
    public function getResponsibleIssues(){
        return $this->hasMany('App\Models\Issues', 'responsible_id');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    
}