<?php 

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
    
    public function permissions()
    {
        return $this->belongToMany('Permission');
    }

    public function getPermissions(){
        return $this->permissions()->pluk('slug')->all();
    }

    public function assignPermission($permissionId = null)
    {
        $permissions = $this->permissions();
        if(!$permissions->contain($permissionId)){
            return $this->permissions()->attach($permissionId);
        } 
        return false;
        
    }
    public function revokePermission($permissionId = null)
    {
        return $this->permissions()->detach($permissionId);

    }
    public function revokeAllPermissions()
    {
        return $this->permissions()->detach();

    }

    public function syncPermissions($permissionIds = array())
    {
        return $this->permissions()->sync($permissionIds);

    }
    public function can($permission){
        $permissions = $this->getPermissions();
        if(is_array($permission)){
            $intersection = array_intersect($permissions, $permission);
            return count($intersection)>0;
        }else{
            return in_array($permission, $permissions);

        }
    }
} 