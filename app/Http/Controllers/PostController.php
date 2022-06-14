<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
Use App\Tag;
use App\Reply;
use App\User;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

            $posts = Post::where('user_id', $user->id)->get();
            $replies= Reply::where('user_id',$user->id)->get();
            $users=User::all('id','username');


        return view('posts', compact('posts','replies','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('cPosts', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tags = explode(',', $request->get('tag'));

        $validatedData = $request->validate([
            'title' => 'required|max:90',
            'contents' => 'required|max:255'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $createdPost = Post::create($validatedData);

        foreach($tags as $tag) {
            $createdTag = Tag::create(['tag' => $tag,'post_id'=>$createdPost->id]);

            //$createdPost->tags()->attach($createdTag);
        }

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = $post->tags;
        return view('ePosts', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:90',
            'contents' => 'required|max:255'
        ]);

        $post->update($validatedData);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->destroy($post->id);
        return back();
    }
}
