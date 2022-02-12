<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::withCount('post')->paginate(100)
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->post()->with('author')->paginate(5);
        $categories = Category::withCount('post')->orderBy('post_count', 'desc')->take(10)->get();
        $recentposts = Post::latest()->take(3)->get();
        $tags = Tag::latest()->take(50)->get();

        return view('categories.show', compact('category','posts','recentposts','tags','categories'));
    }


}
