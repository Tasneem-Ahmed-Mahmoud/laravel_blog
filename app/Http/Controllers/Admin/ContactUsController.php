<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{


    public function index()
    {
        $contactus=ContactUs::paginate(10,['name','email','id','read']);
        return view('admin.contactus.list', compact('contactus'));
    }



    public function show(ContactUs $contactus)
    {

        dd(request()->route());
        if(!request()->ajax()){
            return response()->json(['error' => 'Not Allowed']);
        }
        return response()->json([
            'message' => $contactus->message,
            'toggle_read' => route('admin.contactus.toggle_read',$contactus->id),
            'delete_url' => route('admin.contactus.destroy',$contactus->id),
            'message_status' => $contactus->read,
        ]);

    }


    public function toggle_read(ContactUs $contactus){
        dd(request()->route());
        if($contactus->update(['read' => $contactus->read == "Read"? 0 : 1])){
            return redirect()->back()->with(['success' => 'Contactus updated']);
        }
        return redirect()->back()->withErrors(['error' => 'Contactus updating failed']);

    }

    public function destroy(ContactUs $contactus)
    {

        if($contactus->delete()){
            return redirect()->route("admin.contactus.index")->with(["success"=>'contactus deleted successfuly']);
        }else{
            return redirect()->back()->withErrors(["error"=>'contactus deleted faild']);
        }

    }


}
