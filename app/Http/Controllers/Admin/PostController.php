<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('id'); 

        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::all();
       $tags = Tag::all();
        
       return view("admin.posts.create", compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->all());

        $validateData = $request->validate([
            'title'=>'required|min:5',
            'cover'=>'image|max:500',
            'author'=>'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'text' => 'required|min:10'
        ]);

        if(array_key_exists("cover", $validateData)) {
            $img_path = Storage::put("uploads", $validateData["cover"]);
            $validateData["cover"] = $img_path;
        }

        $post = Post::create($validateData);
        $post->tags()->attach($request->tags);

        return redirect()->route("admin.posts.index");
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
       $categories = Category::all();
       $tags = Tag::all();

        return view("admin.posts.edit", compact('post', 'categories', 'tags'));
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
		$validateData = $request->validate([
			'title'=>'required|min:5| max:255',
			'cover'=>'image|max:500',
			'author'=>'required',
            'category_id'=> 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
			'text' => 'required|min:10'
        ]);
		
        if(array_key_exists("cover", $validateData)) {
            $img_path = Storage::put("uploads", $validateData["cover"]);
            $validateData["cover"] = $img_path;
        }
        
        $post->update($validateData);
        $post->tags()->sync($request->tags);
		
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("admin.posts.index");
    }
}
