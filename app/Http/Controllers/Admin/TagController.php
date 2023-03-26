<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=Tag::orderby('id','desc')->paginate(10,['id','title']);
      
        return view('admin.tags.list',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag=new Tag;
        return view('admin.tags.form',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
$request->merge(['slug'=>str_replace("","-",strtolower($request->slug))]);
       $tag= Tag::create($request->all())
        ;
        // return dd($request->all());
        if($tag){
            return redirect()->route("admin.tags.index")->with(["success"=>'tag added successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'tag creating faild']);
        }
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
    public function edit(tag $tag)
    {
    //    $tag= tag::findOrFail($id);
   return view('admin.tags.form',['tag'=>$tag]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest  $request, tag $tag)
    {
        //
        $request->merge(['slug'=>str_replace("","-",strtolower($request->slug))]);

        // return dd($request->all());
        if($tag->update($request->all())){
            return redirect()->route("admin.tags.index")->with(["success"=>'tag updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'tag updated faild']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //



        if($tag->delete()){
            return redirect()->route("admin.tags.index")->with(["success"=>'tag deleted successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'tag deleted faild']);
        }
       
    }
}
