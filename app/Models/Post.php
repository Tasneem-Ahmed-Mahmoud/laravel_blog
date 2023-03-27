<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Category;
use  App\Models\Comment;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','image','user_id','keywords','description','approved'];


function categories(){
    return $this->belongsToMany( Category::class,'category_post');
}



function setImageAttribute($value){

    if($this->image){
        Storage::disk('posts')->delete($this->image);
    }
    $image= request()->image->store('/','posts'); //root
    $this->attributes['image']=$image;
    // dd($this->attributes);
}

function getApprovedAttribute($value){
    return $value? 'Approved':"rejecte";

}
function comments(){
    return $this->hasMany(Comment::class);
}

}
