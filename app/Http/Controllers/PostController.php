<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->title;
        $post->content = $request->content;
        $post->user_id = '1';
        $post->save();

        // return response()->json(['status' => 'post saved', 'code' => 200]);
        return response()->json(["data" => $post, 'status' => 'post saved', 'code' => 200]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);
        return response()->json($posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->userId);
        $user = User::where('id', $request->userId)->first();
        // dd($user);
        $user->name = $request->user;
        $user->save();
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->title;
        $post->content = $request->content;
        $post->user_id = $user->id;
        $post->save();
        // return response()->json(['status' => 'post saved', 'code' => 200]);
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return response()->json(['status' => 'post deleted', 'code' => 200]);
    }
}
