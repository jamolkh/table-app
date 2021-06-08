<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Project;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create(Project $project)
    {
        return view('form_job_create', ['project'=>$project]);
    }
    public function store(Project $project, Request $request)
    {
        $job = $project->jobs()->create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
        ]);

        for($i=1; $i<=$project->term; $i++)
        {
        $job->month_jobs()->create([
            'amount' => '0',
            'job_amount' => 0,
            'month_order' => $i
        ]);
        }
        $fixedCosts = Cost::where('project_id', $project->id)->where('type', 'fixed')->get();
        $variableCosts = Cost::where('project_id', $project->id)->where('type', 'variable')->get();
        return view('project', ['fixedCosts' => $fixedCosts, 'variableCosts'=>$variableCosts, 'project'=>$project]);
    }
}
