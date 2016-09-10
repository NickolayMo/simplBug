<?php 
namespace App\Http\Controllers;

use Illuminame\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupsController extends Controller{

   
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $groups = Group::paginate(1);      
        return view('groups.index', ['groups'=>$groups]);
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $group = $request->all();
        Group::create($group);
        return redirect('groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $group = group::find($id);
        return view('groups.show', ['group'=>$group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        return view('groups.update', ['group'=>$group]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $groupUpdate = $request->all();
        $group = Group::find($id);
        $group->update($groupUpdate);
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect('/groups');
    }
}