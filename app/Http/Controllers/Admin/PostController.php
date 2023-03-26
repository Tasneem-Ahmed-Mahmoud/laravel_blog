<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::with('categories:categories.title,categories.id')->orderby('id', 'desc')->paginate(10, ['id','title','approved']);

        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories= Category::pluck('title','id');
        // dd($categories);
        $selected_categories=$post->categories->pluck('id')->toArray();
        // dd($selected_categories);
        return view('admin.posts.form',compact('post','categories','selected_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
      
        $request->merge(['approved'=>$request->approved?1:0]);
      
        if($post->update($request->all())){
            $post->categories()->sync($request->categories); 
            return redirect()->route("admin.posts.index")->with(["success"=>'post updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'  post updated faild']);
        }
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route("admin.posts.index")->with(["success"=>'post deleted successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'post deleted faild']);
        }
    }

    public function approve(Post $post)
    {
        if ($post->update(['approved'=> 1 ])) {
            return redirect()->route("admin.posts.index")->with(["success"=>'post approved successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'post approved faild']);
        };
    }
    public function reject(Post $post)
    {
        if ($post->update(['approved'=> '0'])) {
            return redirect()->route("admin.posts.index")->with(["success"=>'post rejected successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'post rejected faild']);
        };
    }
}
