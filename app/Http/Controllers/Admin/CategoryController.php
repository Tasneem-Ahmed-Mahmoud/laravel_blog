<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(10,['id','title']);
        // $categories=Category::pluck('title','id')->toArray();
        // dd($categories);
        return view('admin.categories.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=new Category;
        return view('admin.categories.form',compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

       $category= Category::create($request->all())
        ;
        // return dd($request->all());
        if($category){
            return redirect()->route("admin.categories.index")->with(["success"=>'category added successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'category creating faild']); 
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
    public function edit(Category $category)
    {
    //    $category= Category::findOrFail($id);
   return view('admin.categories.form',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest  $request, Category $category)
    {
        //

       
        // return dd($request->all());
        if($category->update($request->all())){
            return redirect()->route("admin.categories.index")->with(["success"=>'category updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'category updated faild']); 
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
