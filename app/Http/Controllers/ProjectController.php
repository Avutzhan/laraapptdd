<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));

    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {

//        if ( auth()->id() !== (int) $project->owner_id ) {
        if ( auth()->user()->isNot($project->owner)) {
            abort(403);
            //you can do anything redirect abort and do some logic
            //you can check if user can see or not here in method or on middleware or on web routes and so on
        }

        return view('projects.show', compact('project'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        auth()->user()->projects()->create($attributes);

        return redirect('/projects');
    }
}
