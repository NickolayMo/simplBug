<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Comment;
class HomeController extends Controller
{

    private $_issueRepository;

    public function __construct(\App\Repositories\IssueRepository $repository){
        $this->_issueRepository = $repository;
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->all();
        $assingned = isset($q['assigned_to'])? $q['assigned_to'] : 0;
        $project = isset($q['project'])? $q['project'] : 0; 

        $i = new Issue();
        $e = $i->getAllIssues()->orderBy('issues.updated_at', 'DESC');  

        $c = new Comment();
        $comments = $c->getComments($project, $assingned)->orderBy('issues.updated_at', 'DESC');
        if(!empty($assingned)){
            $e->where('responsible_id', '=', $assingned);
            $comments->where('responsible_id', '=', $assingned);
        }
        if(!empty($project)){
            $comments->where('project_id', '=', $project);
            $e->where('project_id', '=', $project);
        }
        $comments = $comments->paginate(10);
        $issues = $e->paginate(10); 
 
        $newIssuesCount = $this->_issueRepository->newIssuesCount($i, $project, $assingned);        
        $testIssuesCount = $this->_issueRepository->testIssuesCount($i, $project, $assingned);        
        $inProgressIssuesCount = $this->_issueRepository->inProgressIssuesCount($i, $project, $assingned);        
        $releaseIssuesCount = $this->_issueRepository->releaseIssuesCount($i, $project, $assingned);        
             
      
        return view('welcome',[
            'issues'=>$issues,
            'comments'=>$comments,
            'newIssuesCount'=> $newIssuesCount,
            'testIssuesCount'=> $testIssuesCount,
            'inProgressIssuesCount'=> $inProgressIssuesCount,
            'releaseIssuesCount'=> $releaseIssuesCount  
            ]);
    }
}
