<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'user_id', 'follower_id',
    ];

    function checkFollow()
    {
        return $this->user_id == $this->follower_id;
    }
}
