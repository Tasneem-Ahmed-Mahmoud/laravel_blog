<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        //

        $admins=Admin::orderby('id','desc')->paginate(10,['id','name','email','approved']);

        return view('admin.admins.list',compact('admins'));
    }


    public function create()
    {

        $admin=new Admin;
        return view('admin.admins.form',compact('admin'));
        //
    }


    public function store(AdminRequest $request)
    {
        dd($request->all());
        
        $request->merge(['approved'=>$request->approved?1:0]);

        $admin= admin::create($request->all())
        ;
        // return dd($request->all());
        if($admin){
            return redirect()->route("admin.admins.index")->with(["success"=>'admin added successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'admin creating faild']);
        }



    }


    public function show(string $id)
    {
        //
    }

 function edit(Admin $admin)
    {
        return view('admin.admins.form',['admin'=>$admin]);
    }


    public function update(AdminRequest $request, Admin $admin)
    { 
        // dd($request->all());
        
        $request->merge(['approved'=>$request->approved?1:0]);
        if(!$request->password){
           $admin= $admin->update($request->except('password')) ;
        }else{
           $admin= $admin->update($request->all());
        }
        if($admin){
            return redirect()->route("admin.admins.index")->with(["success"=>'admin updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'admin updated faild']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {

        if($admin->delete()){
            return redirect()->route("admin.admins.index")->with(["success"=>'admin deleted successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'admin deleted faild']);
        }
    }










    public function approve(Admin $admin)
    {
        if ($admin->update(['approved'=> 1 ])) {
            return redirect()->route("admin.admins.index")->with(["success"=>'admin approved successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'admin approved faild']);
        };
    }
    public function reject(Admin $admin)
    {
        if ($admin->update(['approved'=> '0'])) {
            return redirect()->route("admin.admins.index")->with(["success"=>'admin rejected successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'admin rejected faild']);
        };
    }
}
