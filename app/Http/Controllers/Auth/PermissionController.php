<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $permissions = Permission::paginate(1);      
        return view('permissions.index', ['permissions'=>$permissions]);
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $permission = $request->all();
        Permission::create($permission);
        return redirect('permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        return view('permissions.show', ['permission'=>$permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.update', ['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $permissionUpdate = $request->all();
        $permission = Permission::find($id);
        $permission->update($permissionUpdate);
        return redirect('/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();
        return redirect('/permissions');
    }

}