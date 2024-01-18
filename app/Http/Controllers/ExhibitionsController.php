<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
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
        return Inertia::render('Exhibitions/Index');
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
            return Redirect::route('exhibitions.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
