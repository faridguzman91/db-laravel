<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $projects = ProjectResource::collection(Project::all());

        return Inertia::render('Welcome' , compact('projects'));
    }
}
