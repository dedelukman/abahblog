<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->post()->with('author')->paginate(5);
        $categories = Category::withCount('post')->orderBy('post_count', 'desc')->take(10)->get();
        $recentposts = Post::latest()->take(3)->get();
        $tags = Tag::latest()->take(50)->get();

        return view('tags.show', compact('tag','posts','recentposts','tags','categories'));
    }

}
