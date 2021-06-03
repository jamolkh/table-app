<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Job;
use App\Models\MonthCost;
use Illuminate\Http\Request;
use App\Models\Project;



class ProjectCostController extends Controller
{
    public function index(Project $project)
    {
        $job = Job::where('project_id', $project->id);
        $fixedCosts = Cost::where('project_id', $project->id)->where('type', 'fixed')->get();
        $variableCosts = Cost::where('project_id', $project->id)->where('type', 'variable')->get();
        return view('project', ['fixedCosts' => $fixedCosts, 'variableCosts'=>$variableCosts, 'project'=>$project, 'job'=>$job]);
    }
}
