<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tweet extends Model
{
    protected $fillable = [
        'user_id', 'description',
    ];

    function checkUser(User $user)
    {
        return $this->user_id == $user->id;
    }
}
