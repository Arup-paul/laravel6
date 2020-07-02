<?php

namespace App;

use App\Events\UserCreated;
use App\Model\Post;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable

{
    use Notifiable;

    protected $fillable = [
        'username','email','password','profile_photo','email_verification_token','status','email_verified_at'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    protected $dispatchesEvents  = [
      'created' => UserCreated::class
    ];

    public function posts(){
        return $this->hasMany(Post::class,'user_id');
    }





}
