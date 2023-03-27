<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Post;
use  App\Models\User;
class Comment extends Model
{
    use HasFactory;
    // protected $filebal=['name','email','content','approved','post_id','user_id'];
    protected $fillable = ['name', 'email', 'content','post_id','user_id','approved'];

    function getApprovedAttribute($value){
        return $value? 'Approved':"rejecte";

    }


    function getNameAttribute($value){
        return $this->user_id? $this->user->name:$value;

    }

    function getEmailAttribute($value){
        return $this->user_id? $this->user->email:$value;

    }
function post(){
//  return $this->belongsTo(Post::class,'post_id','id');
return $this->belongsTo(Post::class,'post_id','id');
}
function user(){
    return $this->belongsTo(related:User::class);
}
}
