<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments=Comment::with(['user:id,name','post:id,title'])->paginate(10,['name','email','approved','id','user_id','post_id']);
        // dd($comments[0]->user);
        return view('admin.comments.list', compact('comments'));
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
    public function show(Comment $comment)
    {

        if(!request()->ajax() ){
            return  response()->json(['error' => "not allowed"]);
        }

        return  response()->json(['comment' => $comment->content,
        'reject_url' => route('admin.comments.reject',$comment->id) ,
        'approve_url' => route('admin.comments.approve',$comment->id)]);
    }


    public function destroy(Comment $comment)
    {
        //


        if ($comment->delete()) {
            return redirect()->route("admin.comments.index")->with(["success"=>'comment deleted successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'comment deleted faild']);
        }
    }



    public function approve(Comment $comment)
    {

        // dd(request()->route());
        if($comment->update(['approved' => 1])){
            return redirect()->back()->with(['success' => 'Comment Approved']);
        }
        return redirect()->back()->withErrors(['error' => 'Comment Apporving failed']);
    }
    
    public function reject(Comment $comment)
    {

        if ($comment->update(['approved'=> '0'])) {
            return redirect()->back()->with(["success"=>'comment rejected successfuly']);
        } else {
            return redirect()->back()->withErrors(["error"=>'comment rejected faild']);
        };
    }

}
