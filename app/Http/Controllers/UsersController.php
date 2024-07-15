<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.tabel', compact('users'));
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
        $request->validate([
            'profile_images' => 'mimes:png,jpg,jpeg|required|file|max:2000',
            'name' => 'required|max:50|string',
            'username' => 'required|string|max:50|unique:users,username',
            'age' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'school' => 'nullable|string',
            'bio' => 'nullable|string',
            'instagram' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $path = $request->file('profile_images')->storePublicly('user', 'public');

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->school = $request->school;
        $user->bio = $request->bio;
        $user->profile_images = $path;
        $user->instagram = $request->instagram;
        $user->facebook = $request->facebook;
        $user->linkedin = $request->linkedin;
        $user->github = $request->github;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($user->save()) {
            return redirect()->route('Users.create')->with('success', 'Data Berhasil ditambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:50|string',
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'age' => 'required|integer|nullable',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'school' => 'nullable|string',
            'bio' => 'nullable|string',
            'addres' => 'nullable|string',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'profile_image' => 'mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->storePublicly('user', 'public');

            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $user->profile_image = $path;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->addres = $request->addres;
        $user->school = $request->school;
        $user->bio = $request->bio;
        $user->instagram = $request->instagram;
        $user->tiktok = $request->tiktok;
        $user->youtube = $request->youtube;
        $user->linkedin = $request->linkedin;
        $user->github = $request->github;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($user->save()) {
            return redirect()->route('Users.edit', ['id' => $user->id])->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'User update failed');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_image)
        {
            Storage::disk('public')->delete($user->profile_images);
        }
        $user->delete();

        return redirect()->route('layouts.maintable.Users')->with('success', 'User deleted successfully');
    }

    public function search(Request $request){
        if($request->ajax()){
            $query = $request->input('search');
            $users = User::where('name','like','%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')->get();
            return view('admin.users.partials.index', compact('users'));
        }
    }
}
