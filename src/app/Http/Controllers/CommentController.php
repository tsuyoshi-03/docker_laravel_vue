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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Topic $topic)
    {
        $comment = new Comment;
        $comment->contents = $request->contents;
        $comment->user_id = Auth::id();
        $comment->topic_id = $request->topic_id;
        //dd($comment);
        $comment->save();

        //$newComment = $request->all();
        //$newComment['user_id'] = Auth::id();
        //Comment::create($newComment);

        return redirect()->route('topics.show', ['topic' => $topic->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic, Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('topic','comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Topic $topic, Comment $comment)
    {
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
    public function destroy(Topic $topic, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('topics.show', ['topic' => $topic->id]);
    }
}
