<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller 
{


    public function index(){
        return view('admin.data.dashboard');
    }
    public function show(){
        $user = Auth::user();
        return view('layouts.dashboard', compact('user'));
    }
}
