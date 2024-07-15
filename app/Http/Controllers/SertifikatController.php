<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            AdminMiddleware::class
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sertifikats = Sertifikat::all();
        return view('admin.sertifikat.tabel', compact('sertifikats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sertifikat.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_certificate' => 'required|max:50|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:50',
            'content' => 'required|string',
        ]);

        $path = $request->file('image')->storePublicly('sertifikat', 'public');

        Sertifikat::create([
            'name_certificate' => $request->name_certificate,
            'image' => $path,
            'title' => $request->title,
            'description' => $request->content
        ]);

        return redirect()->route('sertifikat.create')->with('success', 'Sertifikat created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $certificate = Sertifikat::findOrFail($id);
        return response()->json($certificate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        return view('admin.sertifikat.edit', compact('sertifikat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        $request->validate([
            'name_certificate' => 'required|string|max:50',
            'title' => 'string|max:50|required',
            'image' => 'file|mimes:png,jpg,jpeg|max:2000',
            'content' => 'string|required'
        ]);

        if ($path = $request->file('image')?->storePublicly('sertifikat', 'public')) {
            Storage::disk('public')->delete($sertifikat->image);
            $sertifikat->image = $path;
        }

        $sertifikat->name_certificate = $request->name_certificate;
        $sertifikat->title = $request->title;
        $sertifikat->description = $request->content;
        $sertifikat->save();

        return redirect()->route('layouts.maintable.sertifikat')->with('success', 'Certicate success Update!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        Storage::disk('public')->delete($sertifikat->image);
        $sertifikat->delete();

        return redirect()->route('layouts.maintable.sertifikat')->with('success', 'Certificate deleted successfully');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->input('search');
            $sertifikats = Sertifikat::where('name_certificate', 'like', '%' . $query . '%')
                ->orWhere('title', 'like', '%' . $query . '%')->get();
            return view('admin.sertifikat.partials.index', compact('sertifikats'));
        }
    }
}
