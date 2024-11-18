<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $projects = Project::where('category_id', '=', $category->id )->get();

       return Inertia::render('Categories/Edit', [
           'category' => $category,
           'projects' => $projects
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $attr = $request->validate([
            'name'=> 'required|min:3'
        ]);
        $category = Category::find($id);
        $category->update($attr);
        $category->save();
        $user = $request->user();
        $categories = Category::all();
       return to_route('projects.index',[
            'projects' => $user->projects()->latest()->get(),
        'categories' => $categories
        ])->with('message', 'Successfully Updated Category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
