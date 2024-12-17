<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();  // Đây là một phương thức tĩnh của Eloquent ORM để lấy tất cả các bản ghi từ bảng posts trong cơ sở dữ liệu.
        return view("home", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("cr");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        DB::table('posts')->insert([
            'title' => $title,
            'content' => $content,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("ed", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $post->update([
            'title' => $title,
            'content' => $content,
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        DB::table('posts')->where('title', $post->title)->delete();
        return redirect()->route('posts.index');
    }
}
