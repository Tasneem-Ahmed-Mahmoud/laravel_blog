<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
 
class Admin  extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = ['name', 'email', 'password','approved','image'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }



    function getApprovedAttribute($value){
        return $value? 'Approved':"rejecte";
    
    }


    function setImageAttribute($value){
        if($this->image){
            Storage::disk('admins')->delete($this->image);
        }

        $image= request()->image->store('/','admins'); //root
        $this->attributes['image']=$image;
        // dd($this->attributes);
    }
}
