<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{

    protected $fillable = [
        'text',
        'user_id',
        'issue_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function issue(){
        return $this->belongsTo('App\Models\Issue');
    }

}