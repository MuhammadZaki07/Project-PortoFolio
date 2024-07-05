<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Requests\StorecommentsRequest;
use App\Http\Requests\UpdatecommentsRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $posts = Post::with(['user', 'comments.user'])->where('slug', $slug)->firstOrFail();
        return view('layouts.postview', compact('posts'));
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
    public function store(Request $request, string $slug)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comment' => 'required|string|max:1000'
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => $request->comment
        ]);

        return redirect()->route('post.views', $slug)->with('success', 'Komentar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment = Comment::with('likes', 'likesCount')
            ->where('id', $id)
            ->firstOrFail();

       
        $likesCount = $comment->likesCount ? $comment->likesCount->aggregate : 0;

        return view('comment.show', compact('comment', 'likesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
