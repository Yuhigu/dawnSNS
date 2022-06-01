<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function create(Request $request){
        $tweetname = $request -> input('tweetname');
        DB::table('posts')->insert([
            'posts' => $tweetname,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/top');
    }
}
