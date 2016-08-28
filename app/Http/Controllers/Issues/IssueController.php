<?php

namespace App\Http\Controllers\Issues;

use Illuminate\Http\Request;

use App\Models\Issue;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $issues = Issue::with('status', 'severity')->paginate(1);      
        return view('issues.index', ['issues'=>$issues]);
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('issues.create');
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
}
