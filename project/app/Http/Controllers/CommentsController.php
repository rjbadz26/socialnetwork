<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function addComment(Request $request){
    	Comment::create($request->all());
    }
}
