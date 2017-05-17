<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers()
    {
        return $this->belongsToMany('App\User', 'following', 'follower_id', 'user_id');
    }

    // Get all users we are following
    public function following()
    {
        return $this->belongsToMany('App\User', 'following', 'user_id', 'follower_id');
    }


    function checkUser(User $user)
    {
        return $this->id !== $user->id;

    }

}
