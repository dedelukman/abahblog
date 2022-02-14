<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    private $rules = [
        'post_id' => 'required|numeric',
        'the_comment' => 'required|min:3|max:1000'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->paginate(10);
        return view('admin_dashboard.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::pluck('title', 'id');
        return view('admin_dashboard.comments.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();

        Comment::create($validated);
        return redirect()->route('admin.comments.create')->with('success', 'Comment has been added');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $posts = Post::pluck('title', 'id');
        return view('admin_dashboard.comments.edit', compact('comment', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate($this->rules);
        $comment->update($validated);
        return redirect()->route('admin.comments.edit', $comment)->with('success', 'Comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment has been deleted');
    }
}
