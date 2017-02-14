<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{

	public function getHome(){
        $user = Auth::user()->id;
		$posts = Post::whereUserId($user)->orderBy('created_at','desc')->get();
    	return view('users.home', compact('posts'));
    }

    public function getPosts(){
        $user = Auth::user()->id;
        $posts = Post::whereUserId($user)->orderBy('created_at','desc')->get();
        return view('posts.posts', compact('posts'));
    }

    public function addPost(Request $request){

    	Post::create($request->all());

    	
    }
}
