<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use App\Models\Project;



class ProjectCostController extends Controller
{
    public function index(Project $project)
    {
        $costs = Cost::where('project_id', $project->id)->get();
        return view('project', ['costs' => $costs]);
    }
}
