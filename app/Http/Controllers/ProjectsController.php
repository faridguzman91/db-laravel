<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::all());  // Use the resource collection here
        return Inertia::render('Projects/Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Projects/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the image and name
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'min:3'],
            'description' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'category' => ['required', 'string'],
            'materials' => ['required', 'array'],
            'project_url' => ['required', 'url']
        ]);

        // store images when image is true

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects');

            Project::create([
                'name' => $request->name,
                'image' => $imagePath,
                'description' => $request->description,
                'year' => $request->year,
                'category' => $request->category,
                'materials' => $request->materials,
                'project_url' => $request->project_url
            ]);
            return to_route('projects.index')->with('message', 'Project created succesfully');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return Inertia::render('Projects/Edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'project_url' => ['required', 'url'],
            'images.*' => ['image']
        ]);


        $images = $project->images ?? [];
        if ($request->hasFile('images')) {
            //delete image then reassign
            foreach ($request->file('images') as $image) {
                Storage::delete($project->images);
                $images[] = $image->store('projects');
            }
        }

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'year' => $request->year,
            'images' => $images,
            'project_url' => $request->project_url
        ]);
        return to_route('projects.index')->with('message', 'Project updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::delete($image);
            }
        }
        $project->delete();

        return to_route('projects.index')->with('message', 'Project deleted succesfully');
    }
}
