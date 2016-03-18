<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $comment = Comment::all();

        return view('articles.show')->with(compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->user_id  = Auth::user()->id;
        $comment->content  = $request->content;
        $comment->post_id = $request->post_id;

        $comment->save();

        return redirect()
            ->route('articles.show', $request->post_id)
            ->with(compact('comment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment   = Comment::find($id);

        return view('comment.edit')->with(compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->content = $request->content;
        //$comment->user_id = $request->user_id;

        $comment->update();

        return redirect()->route('articles.show', $comment->post_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();


        return redirect()->route('articles.show', $comment->post_id);

    }
}
