<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['technologies'])->get();
        return response()->json([
            "results"=> $projects,
        ]);
    }

    public function show($slug){
        $projects = Project::where('slug',$slug)->first();
        return response()->json([
            'results'=>$projects,
            'success'=>true
        ]);
    }
}
