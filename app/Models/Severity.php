<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Severity extends Model{

    public function issues(){
        return $this->hasMany('App\Models\Issues');
    }   
    
}