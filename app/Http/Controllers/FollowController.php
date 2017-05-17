<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

use DB;
use Auth;
use Session;

class FollowController extends Controller
{

    public function follow(Request $request)
    {
        DB::table('following')->insert(
            ['user_id' => Auth::user()->id, 'follower_id' => $request->input('userID')]
        );

        Session::flash('success', 'Followed user!');

        return redirect('users');
    }

    public function checkIfFollow()
    {
        $test = DB::table('follwing')->where('user_id' , Auth::user()->id)->get();

        return $test;
    }

}
