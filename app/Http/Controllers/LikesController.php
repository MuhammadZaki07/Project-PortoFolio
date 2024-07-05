<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorelikesRequest;
use App\Http\Requests\UpdatelikesRequest;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function toggleLike(Request $request)
    {
        $like = Likes::where('user_id', auth()->id())
                    ->where('comment_id', $request->comment_id)
                    ->first();

        if ($like) {
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            Likes::create([
                'user_id' => auth()->id(),
                'comment_id' => $request->comment_id,
            ]);
            return response()->json(['liked' => true]);
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelikesRequest $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(likes $likes)
    {
        //
    }
}
