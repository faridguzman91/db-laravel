<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExhibitionResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Exhibition;
use App\Models\Project;

class ExhibitionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exhibitions = ExhibitionResource::collection(Exhibition::with('project')->get());
        return Inertia::render('Exhibitions/Index', compact('exhibitions'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return Inertia::render('Exhibitions/Create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        //validate the image and name and project id
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'min:3'],
            'project_id' => ['required']
        ]);

        // store image when image is true
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('exhibitions');

            Exhibition::create([
                'project_id' => $request->project_id,
                'name' => $request->name,
                'image' => $image,
                'project_url' => $request->project_url
            ]);
            return to_route('exhibitions.index')->with('message', 'Exhibition created succesfully');
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
    public function edit(Exhibition $exhibition)
    {
        $projects = Project::all();
        return Inertia::render('Exhibitions/Edit', compact('exhibition', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exhibition $exhibition)
    {
        $image = $exhibition->image;
        $request->validate([
            'name' => ['required', 'min:3'],
            'project_id' => ['required']
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($exhibition->image);
            $image = $request->file('image')->store('projects');
        }

        $exhibition->update([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'project_url' => $request->project_url,
            'image' => $image
        ]);
        return to_route('exhibitions.index')->with('message', 'Exhibition updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibition $exhibition)
    {
        Storage::Delete($exhibition->image);
        $exhibition->delete();
        return to_route('exhibitions.index')->with('message', 'Exhibition deleted succesfully');
    }
}
