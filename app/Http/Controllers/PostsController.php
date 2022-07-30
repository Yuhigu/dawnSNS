<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('users')
            ->join ('posts', 'users.id', '=', 'posts.user_id')
            ->select ('users.username', 'users.images', 'posts.*')
            ->get ();
        return view('posts.index',['posts' => $posts]);
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

    public function update(Request $request){
        $update = $request->input('tweet');
        $sendId = $request->input('postId');
        DB::table('posts')->where('id', $sendId)
            ->update([
                'posts' => $update,
                'updated_at' => now(),
            ]);
        return redirect('/top');
    }

    public function delete(Request $request){
        $sendId = $request -> input('postId');
        DB::table('posts')->where('id', $sendId)
            ->delete();
        return redirect('/top');
    }
}
