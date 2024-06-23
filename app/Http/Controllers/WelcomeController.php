<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExhibitionResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome()
    {
        // add collection
        $projects = ProjectResource::collection(Project::all());
        $exhibitions = ExhibitionResource::collection(Exhibition::with('project')->get());

        //add inertia props
        return Inertia::render('Welcome' , compact('projects', 'exhibitions'));
    }
}
