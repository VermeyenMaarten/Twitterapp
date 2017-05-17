<?php

namespace App\Http\Controllers;

use App\Tweet;
use Auth;
use DB;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tweet = new Tweet;

        $tweet->user_id =  Auth::user()->id;
        $tweet->description = $request->description;
        $tweet->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $tweets = Tweet::whereIn('user_id', function($query)
        {
            $query->select('follower_id')
                ->from('following')
                ->where('user_id', Auth::user()->id);
        })->orWhere('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')->get();


        return view('/home', [
            'tweets' => $tweets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tweet = Tweet::find($id);

        $tweet->description = $_POST['description'];
        $tweet->save();

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::where('id', $id);
        $tweet->delete();

        return redirect ('/home');
    }

    public function showSingleTweet($id) {
        $tweet = Tweet::find($id);
        return view('tweet', ['tweets' => $tweet]);
    }

    public function globalTweets() {

        $tweets = Tweet::orderBy('created_at', 'desc')->get();

        return view('/global', [
            'tweets' => $tweets
        ]);
    }

}
