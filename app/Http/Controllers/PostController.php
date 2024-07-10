<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.tabel', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('admin.post.form', compact('user','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'string|max:150|required',
            'category' => 'required|exists:category,id_category',
            'slug' => 'string|required|max:150',
            'image_post' => 'mimes:png,jpg,jpeg|required|max:2000',
            'content' => 'required|string'
        ]);

        $path = $request->file('image_post')->storePublicly('post', 'public');
        Post::create([
            'user_id' => Auth::id(),
            'id_category' => $request->category,
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'image' => $path,
            'content' => $request->content
        ]);

        return redirect()->route('post.create')->with('success', 'Postingan Telah Dibuat!!');
    }




    /**
     * Display the specified resource.
     */
    public function show($slug)
{
    $post = Post::where('slug', $slug)->with('user')->firstOrFail();
    return view('admin.post.views', compact('post'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $post = Post::findOrFail($id);

    $request->validate([
        'category' => 'required|exists:category,id_category',
        'title' => 'string|max:150|required',
        'slug' => 'string|required|max:150',
        'image_post' => 'mimes:png,jpg,jpeg|file|max:2000',
        'content' => 'required|string'
    ]);

    if ($path = $request->file('image_post')?->storePublicly('post', 'public')) {
        Storage::disk('public')->delete($post->image);
        $post->image = $path;
    }

    $post->user_id = Auth::id();
    $post->id_category = $request->category;
    $post->title = $request->title;
    $post->slug = $request->slug;
    $post->content = $request->content;
    $post->save();

    return redirect()->route('layouts.maintable')->with('success', 'Post Success Update!!!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return redirect()->route('layouts.maintable')->with('success', 'Data berhasil dihapus!');
    }

    public function destroy2(string $id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return redirect()->route('blog.show')->with('success', 'Data berhasil dihapus!');
    }
}
