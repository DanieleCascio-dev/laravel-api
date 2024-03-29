<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['technologies'])->paginate(6);
        return response()->json([
            "results"=> $projects,
        ]);
    }

    public function show($slug){
        $projects = Project::with('technologies','type')->where('slug',$slug)->first();
        if($projects){

            return response()->json([
                'results'=>$projects,
                'success'=>true
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'message'=> 'no project found'
            ]);
        }
    }
}
