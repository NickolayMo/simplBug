<?php

namespace App\Http\Controllers\Issues;

use Illuminate\Http\Request;

use App\Models\Issue;
use App\Models\Comment;
use App\Models\User;
use App\Models\Severity;
use App\Models\Status;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $issues = Issue::with('status', 'severity','executor', 'creator', 'responsible', 'comments')->paginate(5); 
        return view('issues.index', ['issues'=>$issues]);
        
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
        
        return view('issues.create', [
            'users'=>$users,
            'severities'=>$severities,
            'statuses'=>$statuses
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $issue = $request->all();
        Issue::create($issue);
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
