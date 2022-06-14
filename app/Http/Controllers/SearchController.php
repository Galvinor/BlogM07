<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Reply;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $text = $request->get('text');
        $posts = Post::where('title', 'LIKE', "%{$text}%")->get();
        $postsC = Post::where('contents', 'LIKE', "%{$text}%")->get();
        $replies=Reply::all();
        $users=User::all('id','username');

        return view('searchResult', compact('posts','postsC','users','replies'));
    }
}
