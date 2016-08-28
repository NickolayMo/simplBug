<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

    public function getCreatedIssues(){
        return $this->hasMany('App\Models\Issues', 'creator_id');
    }
    public function getExecutorIssues(){
        return $this->hasMany('App\Models\Issues', 'executor_id');
    }
    public function getResponsibleIssues(){
        return $this->hasMany('App\Models\Issues', 'responsible_id');
    }
    
}