<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
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
            'FormSubmissions/Index',
            [
                "submissions" => $user->submissions()->latest()->get()
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        $attributes['user_id'] = auth()->id();
        FormSubmission::create($attributes);
        return redirect()->route('submissions.index')->with('message', 'Submission Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormSubmission $submission)
    {
        return Inertia::render('FormSubmissions/Show', [
            'submission' => $submission
        ]);
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormSubmission $submission)
    {
        $submission->delete();
        return redirect()->route('projects.index')->with('message', 'Project deleted Successfully');
    }
}
