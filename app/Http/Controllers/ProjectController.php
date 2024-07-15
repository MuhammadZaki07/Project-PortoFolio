<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProjectController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            AdminMiddleware::class,
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.tabel',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.project.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|exists:category,id_category',
            'name_project' => 'required|max:50|string',
            'url_project' => 'required|string',
            'url_youtube' => 'required|string',
            'url_github' => 'required|string',
            'thumnail_project' => 'required|mimes:png,jpg,jpeg|max:2000|file',
            'content' => 'required|max:200'
        ]);

        $path = $request->file('thumnail_project')->storePublicly('project', 'public');
        Project::create([
            'id_category' => $request->category,
            'name_project' => $request->name_project,
            'url_project'=> $request->url_project,
            'url_youtube'=> $request->url_youtube,
            'url_github'=> $request->url_github,
            'thumnail_project' => $path,
            'description_project' => $request->content
        ]);

        return redirect()->route('project.create')->with('success', 'Project added successfully!!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::all();
        return view('admin.project.edit',compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        $request->validate([
            'category' => 'required|exists:category,id_category',
            'name_project' => 'required|max:100|string',
            'url_project' => 'required|string',
            'url_youtube' => 'required|string',
            'url_github' => 'required|string',
            'thumnail_project' => 'nullable|mimes:png,jpg,jpeg|max:2000|file',
            'content' => 'required|string'
        ]);

        if($path = $request->file('thumnail_project')?->storePublicly('project','public')){
            Storage::disk('public')->delete($project->thumnail_project);
            $project->thumnail_project = $path;
        }


        $project->id_category = $request->category;
        $project->name_project = $request->name_project;
        $project->url_project = $request->url_project;
        $project->url_youtube = $request->url_youtube;
        $project->url_github = $request->url_github;
        $project->description_project = $request->content;
        $project->save();

    return redirect()->route('layouts.maintable.project')->with('success', 'Project updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        Storage::disk('public')->delete($project->thumnail_project);
        $project->delete();
        return redirect()->route('layouts.maintable.project')->with('success', 'Project deleted successfully!!');
    }

    public function destroy2(string $id)
    {
        $project = Project::findOrFail($id);
        Storage::disk('public')->delete($project->thumnail_project);
        $project->delete();
        return redirect()->route('project.show')->with('success', 'Project deleted successfully!!');
    }


    public function search(Request $request){
        if($request->ajax()){
            $query = $request->input('search');
            $projects = Project::where('name_project', 'like' , '%' . $query . '%')->get();
            return view('admin.project.partials.index', compact('projects'));
        }
    }
}
