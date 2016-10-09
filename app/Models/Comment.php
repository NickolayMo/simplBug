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

    /**
     * Get comments by issue project and user
     * @param type $projectId
     * @param type $assingned
     * @return type
     */
    public function getComments($projectId, $assingned){
        $comments = $this->leftJoin('issues', 'issues.id', '=', 'comments.issue_id');
        if(!empty($projectId)){
           $comments->where('issues.project_id', '=', $projectId);   
        }
        if(!empty($assingned)){               
           $comments->where('issue.responsible_id', '=', $assingned);
        }
        $comments->select('*');
        return $comments;
    }

}