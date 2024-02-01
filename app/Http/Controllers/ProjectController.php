<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
        
        $types = Type::all();

        return view('admin.projects.index',compact('projects','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create',compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request);
        $form_data = $request->validated();
        $project = new Project();
        $project->fill($form_data);
        $project->save();

        if($request->has('technologies')){
            $project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show',compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $types = Type::all();
        
        return view('admin.projects.show',compact('project','types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit',compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, $slug)
    {
        $project_to_update = $request->validated();
        $project = Project::where('slug',$slug)->first();
        $project->update($project_to_update);

        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->sync([]);
        }

        return redirect()->route('admin.projects.show',['project'=>$project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $project = Project::where('slug',$slug)->first();
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
