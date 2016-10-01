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

    public function permissions(){
        return $this->roles()->permissions();
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Auth\Role', 'user_role');
    }

    public function assignRole($roleId = null)
    {
        $roles = $this->roles();
        if(!$roles->contains($roleId)){
            return $this->roles()->attach($roleId);
        }
        return false;
    }

    public function revokeRole($roleId = '')
    {
        return $this->roles()->detach($roleId);
    }

    public function revokeAllRole()
    {
         return $this->roles()->detach();
    }

    public function syncRoles($roleIds = array())
    {
        return $this->roles()->sync($roleIds);
    }

    public function can($permission, $arguments = [])
    {      
        foreach ($this->roles()->get() as $role) {
            if($role->can($permission)){
                return true;
            }
        }
        return false;
    }

    public function getAllPermissions(){
        $permission = [];
        foreach ($this->roles()->get as $role) {
            $permission[] = $role->getPermissions();
        }
    }

    public function isRole($slug){
        $slug = strtolower($slug);
        foreach ($this->roles()->get() as $role) {
            if($role->slug === $slug){
                return true;
            }
            
        }
        return false;
   

    }

       
}