<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index(){
        $projects = Project::all();
        $posts = Post::with('user')->get();
        return view('index', compact('projects', 'posts'));
    }


    public function view($slug){
        $posts = Post::where('slug', $slug)->firstOrFail();
        $users = User::find($posts->user_id);
        return view('layouts.postview', compact('users', 'posts'));
    }

}
