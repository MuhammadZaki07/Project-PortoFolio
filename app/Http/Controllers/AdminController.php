<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Comment;
use App\Models\Likes;
use App\Models\Post;
use App\Models\Project;
use App\Models\Sertifikat;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            AdminMiddleware::class
        ];
    }
    public function index(){
        $user = User::count();
        $project = Project::count();
        $post = Post::count();
        $like = Likes::count();
        $comments = Comment::count();
        $certifikat = Sertifikat::count();
        return view('admin.data.dashboard', compact('user','project','post','like','comments','certifikat'));
    }
    public function show(){
        $user = Auth::user();
        return view('layouts.dashboard', compact('user'));
    }
}
