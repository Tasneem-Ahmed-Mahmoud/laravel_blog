<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $users=User::orderby('id','desc')->paginate(10,['id','name','email','approved']);
      
        return view('admin.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user=new User;
        return view('admin.users.form',compact('user'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $request->merge(['approved'=>$request->approved?1:0]);
      
        $user= User::create($request->all())
        ;
        // return dd($request->all());
        if($user){
            return redirect()->route("admin.users.index")->with(["success"=>'user added successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'user creating faild']);
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
    public function edit(User $user)
    {
        return view('admin.users.form',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {  $request->merge(['approved'=>$request->approved?1:0]);
        if(!$request->password){
           $user= $user->update($request->except('password')) ;
        }else{
           $user= $user->update($request->all());
        }
        if($user){
            return redirect()->route("admin.users.index")->with(["success"=>'user updated successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'user updated faild']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
    
        if($user->delete()){
            return redirect()->route("admin.users.index")->with(["success"=>'user deleted successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'user deleted faild']);
        }
    }










    public function approve(User $user)
    {
        if ($user->update(['approved'=> 1 ])) {
            return redirect()->route("admin.users.index")->with(["success"=>'user approved successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'user approved faild']);
        };
    }
    public function reject(User $user)
    {
        if ($user->update(['approved'=> '0'])) {
            return redirect()->route("admin.users.index")->with(["success"=>'user rejected successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'user rejected faild']);
        };
    }



}
