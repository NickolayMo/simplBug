<?php
namespace App\Repositories;

use App\Models\Issue;

class IssueRepository 
{
    public function getOrderedIssues($issue, $column, $order){
        return $issue->orderBy('issues.'.$column, $order);
    }

    public function getSearchForIssue($issue, $query){
        return $issue->whereRaw("(LOWER(issues.title) LIKE '%".strtolower($query)."%')");       
    }

    public function getFilteredIssues($issue, $filters){
        $restrictions = [           
            'severity_id',
            'status_id'
        ];
        $result = [];
        foreach($restrictions as $restriction){
            if(isset($filters[$restriction])){
                $result[$restriction]= $filters[$restriction];                
            }
        }
        if(empty($result)){
            return $issue;
        }
        foreach($result as $col=>$elem){
            $issue->whereIn($col, $elem);
        }
        return $issue;
    }

    
}