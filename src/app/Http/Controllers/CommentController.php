<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

use App\Topic;
use Auth;

class CommentController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->contents = $request->contents;
        $comment->user_id = Auth::id();
        $comment->topic_id = $request->topic_id;
        $comment->save();
        return redirect()->route('topics.show', ['topic' => $request->topic_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $comment = Comment::find($id);
        $topic = Topic::find($comment->topic_id);
        $this->authorize('update', $comment);
        $comment->update($request->all());
        return redirect()->route('topics.show', ['topic' => $topic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $topic = Topic::find($comment->topic_id);
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('topics.show', ['topic' => $topic->id]);
    }
}
