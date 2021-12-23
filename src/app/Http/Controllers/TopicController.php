<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;

use App\Topic;
use Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $topics->load('user');
        return view('topics.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        //$topic = new Topic;
        //$topic->title = $request->title;
        //$topic->contents = $request->contents;
        //$topic->user_id = Auth::id();
        //dd($topic->title, $topic->contents, $topic->user_id);
        //$topic->save();

        $input = $request->all();
        $input['user_id'] = Auth::id();
        Topic::create($input);
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);

        if(Auth::id() !== $topic->user_id){
            //return abort(404);
            //return view('topics.show', compact('topic'));
            return back();
        }

        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicRequest $request, $id)
    {
        $topic = Topic::find($id);

        if(Auth::id() !== $topic->user_id){
            return back();
        }

        $topic->update($request->all());
        return view('topics.show', compact('topic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Topic::find($id);

        if(Auth::id() !== $topic->user_id){
            return back();
        }

        $topic->delete();
        return redirect()->route('topics.index');
    }
}
