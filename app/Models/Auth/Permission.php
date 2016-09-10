<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    public function roles()
    {
        return $this->belongsToMany('Role');
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
}