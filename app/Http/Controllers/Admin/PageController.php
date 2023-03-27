<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages=Pages::orderby('id','desc')->paginate(10,['id','title']);

        return view('admin.pages.list',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page=new Pages;
        return view('admin.pages.form',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {

        // dd($request->all());
        $request->merge(['slug'=>str_replace("","-",strtolower($request->slug))]);
        $page= Pages::create($request->all())
         ;
         // return dd($request->all());
         if($page){
             return redirect()->route("admin.pages.index")->with(["success"=>'page added successfuly']);
         }else{
             return redirect()->back()->withErrors(["error"=>'page creating faild']);
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
    public function edit(Pages $page)
    {
        return view('admin.pages.form',['page'=>$page]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Pages $page)
    {

       
        $request->merge(['slug'=>str_replace("","-",strtolower($request->slug))]);

        // return dd($request->all());
        if($page->update($request->all())){
            return redirect()->route("admin.pages.index")->with(["success"=>'page updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'page updated faild']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Pages $page)
    {

        if($page->delete()){
            return redirect()->route("admin.categories.index")->with(["success"=>'page deleted successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'page deleted faild']);
        }
    }
}
