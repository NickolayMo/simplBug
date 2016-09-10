<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller{

        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $comments = Comment::paginate(1);      
        return view('comments.index', ['comments'=>$comments]);
        
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $comment = $request->all();
        Comment::create($comment);
        return redirect('comments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('comments.show', ['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.update', ['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $commentUpdate = $request->all();
        $comment = Comment::find($id);
        $comment->update($commentUpdate);
        return redirect('/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect('/comments');
    }
}
