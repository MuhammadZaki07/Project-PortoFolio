<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index(){
        $projects = Project::latest()->take(2)->get();
        $posts = Post::oldest()->take(2)->with('user')->get();
        return view('index', compact('projects', 'posts'));
    }


    public function view($slug){
        $posts = Post::where('slug', $slug)->firstOrFail();
        $users = User::find($posts->user_id);
        return view('layouts.postview', compact('users', 'posts'));
    }

    public function show_project__(){
        $projects = Project::all();
        $categories = Category::all();
        return view('page_blog_project.project', compact('projects','categories'));
    }

    public function show_blog__(){
        $posts = Post::all();
        $categories = Category::all();
        return view('page_blog_project.blog', compact('posts','categories'));
    }

}
