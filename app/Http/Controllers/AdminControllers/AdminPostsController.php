<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Nullable;

class AdminPostsController extends Controller
{

    private $rules = [
        'title' => 'required|max:200',
        'category_id' => 'required|numeric',
        'thumbnail' => 'required|file|mimes:jpg,png,webp,svg,jpeg',
        'body' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderBy('id', 'DESC')->get();
        return view('admin_dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('admin_dashboard.posts.create', compact('categories'));
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
        $validated['slug'] = Str::slug($request->title);

        $post = Post::create($validated);

        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => 'storage/'. $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_test = Tag::where('name', $tag)->get();
            if ($tag_test->isEmpty()) {
                $tag_ob = Tag::create([
                    'name' => trim($tag),
                    'slug' => Str::slug($tag),
                ]);
                $tags_ids[] = $tag_ob->id;
            }else{
                $tag_ob = Tag::where('name', $tag)->get();
                $tags_ids[] = $tag_ob[0]['id'];
            }

        }

        if(count($tags_ids) > 0)
            $post->tag()->sync( $tags_ids );


        return redirect()->route('admin.posts.create')->with('success', 'Post has been created.');
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
    public function edit(Post $post)
    {
        $tags = '';
        foreach($post->tag as $key => $tag)
        {
            $tags .= $tag->name;
            if($key !== count($post->tag) - 1){
                 $tags .= ', ';
            }

        }

        $categories = Category::pluck('name', 'id');
        return view('admin_dashboard.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail' ]= 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=800,max_height=300';
        $validated = $request->validate($this->rules);

        $post->update($validated);

        if ($request->has('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => 'storage/'. $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){
            $tag_exist = $post->tag()->where('name', trim($tag))->count();
            $tag_test = Tag::where('name', $tag)->get();
            if ($tag_exist == 0) {
                if ($tag_test->isEmpty()) {
                    $tag_ob = Tag::create([
                        'name' => trim($tag),
                        'slug' => Str::slug($tag),
                    ]);
                    $tags_ids[] = $tag_ob->id;
                }else{
                    $tag_ob = Tag::where('name', $tag)->get();
                    $tags_ids[] = $tag_ob[0]['id'];
                }
            }


        }

        if(count($tags_ids) > 0)
            $post->tag()->syncWithoutDetaching( $tags_ids );

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tag()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post has been Deleted.');
    }
}
