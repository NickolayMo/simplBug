<?php

namespace App\Http\Controllers\Issues;

use Illuminate\Http\Request;

use App\Models\Issue;
use App\Models\Comment;
use App\Models\User;
use App\Models\Severity;
use App\Models\Status;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Repositories\IssueRepository;

class IssueController extends Controller
{
    /** IssueRepository $_repository */
    private $_repository;

    public function __construct(IssueRepository $repository){
        $this->_repository = $repository;
    }
      /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request){
       
        $filters = $request->all();
        $i = new Issue();
        $e = $i->getAllIssues();
        $e = $this->_applyFilters($request, $e); 
        $issues = $e->paginate(2);
        $severities = Severity::get();
        $projects = Project::get();     
        $statuses = Status::get();
        $users = User::get();             
        return view('issues.index', [
            'issues'=>$issues, 
            'filters'=>$filters,
            'severities'=>$severities,
            'projects'=>$projects,
            'statuses'=>$statuses,
            'users'=>$users
            ]);
        
    }


    protected function _applyFilters(Request $request, $issues){
        $filters = $request->all();       
        $issues = $this->_applySort($filters, $issues);
        $issues = $this->_applyRestrictions($filters, $issues);
        $issues = $this->_applySearch($filters, $issues);
        return $issues;       
    }

   
    protected function _applySort($filters, $issue){        
        if(!isset($filters['order_by'])){
            return $issue->orderBy('issues.id', 'ASC');;
        } 
        $order = (isset($filters['ordering']) && strtolower($filters['ordering']) === 'desc') ? 'DESC' : 'ASC';  
        return $this->_repository->getOrderedIssues($issue, $filters['order_by'], $order);
    }

    protected function _applyRestrictions($filters, $issue){
        return $this->_repository->getFilteredIssues($issue, $filters);
    }

    protected function _applySearch($filters, $issue){
        if(!isset($filters['q'])){
            return $issue;
        }     
        return $this->_repository->getSearchForIssue($issue, $filters['q']);

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all();
        $severities = Severity::all();
        $statuses = Status::all();
        $projects = Project::all();
        
        return view('issues.create', [
            'users'=>$users,
            'severities'=>$severities,
            'statuses'=>$statuses,
            'projects'=>$projects
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $issue = $request->all();
        $issue['creator_id'] = \Auth::user()->id;      
        Issue::create($issue);        
        if(isset($issue['issue_save_and_repeat'])){
            return redirect('issues.create');
        }
        return redirect('issues');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $issue = Issue::find($id);
        return view('issues.show', ['issue'=>$issue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $issue = Issue::find($id);
        return view('issues.update', ['issue'=>$issue]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $issueUpdate = $request->all();
        $issue = Issue::find($id);
        $issue->update($issueUpdate);
        return redirect('/issues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Issue::find($id)->delete();
        return redirect('/issues');
    }

    public function addComment(Request $request, $issueId){
        $comment = $request->all();
        $comment['user_id'] = \Auth::user()->id;
        $comment['issue_id'] = $issueId;
        Comment::create($comment);
        return redirect('/issues');        
    }
}
