<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

class UserController extends Controller
{
    public function index() {

        $users = User::orderBy('id', 'asc')->get();

        return view('/users', [
            'users' => $users
        ]);
    }
}
