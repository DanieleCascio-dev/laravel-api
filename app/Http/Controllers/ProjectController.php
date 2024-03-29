<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if($request->hasFile('image_path')){
            $image_path = Storage::put('project_image', $request->image_path);
            $project->image_path = $image_path;

        };
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

        if($request->hasFile('image_path')){
            if($project->image_path){
                Storage::delete($project->image_path);
            }
            $path = Storage::put('project_image', $request->image_path);
            $project_to_update['image_path'] = $path;
        }
        
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
