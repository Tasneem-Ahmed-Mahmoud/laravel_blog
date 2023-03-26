<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Post;
class Category extends Model
{
    use HasFactory;
    // protected $filebal=['title','slug','keywords'];
    protected $fillable = ['title', 'slug', 'keywords','description'];

    // function posts(){
    //     return $this->hasMany(Post::class);
    // }

}
