<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $filebal=['name','email','content','approved','post_id','user_id'];
    // protected $fillable = ['name', 'email', 'content','post_id','user_id','approved'];


}
