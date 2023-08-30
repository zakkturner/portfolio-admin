<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();

        return Inertia::render(
            'Projects/Index',
            [
                "projects" => $user->projects()->latest()->get()
            ]
        );
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
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required',
            'site' => 'required',
            'status' => 'required'
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['img_src'] = request()->file('img_src')->store('project_images');
        Project::create($attributes);
        return redirect()->route('projects.index')->with('message', 'Job Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return Inertia::render('Projects/Show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return Inertia::render('Projects/Edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'category_id' => 'required',
            'site' => 'required',
            'status' => 'required'
        ]);
        if ($attributes['img_src'] ?? false) {
            $attributes['img_src'] = request()->file('img_src')->store('project_images');
        }
        $project->update($attributes);

        return redirect()->route('projects.index')->with('message', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('message', 'Project deleted Successfully');
    }
}
