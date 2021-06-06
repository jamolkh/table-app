<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('business-plans', ['projects' => $projects]);
    }
    public function edit(Project $project)
    {
        return view('project-edit', ['project' => $project]);
    }

    public function update(Project $project, Request $request)
    {


        $fixed_costs = $project->costs()->where('type', 'fixed')->get();
        $variable_costs = $project->costs()->where('type', 'variable')->get();
        $jobs = $project->jobs()->get();
        foreach($jobs as $job)
        {
            $jobs_edit = $request->get('month_jobs' . $job->id);
            for($i=0;$i<$project->term;$i++)
            {
                $job->month_jobs[$i]->update([
                    'job_amount'=> $jobs_edit[$i],
                    'amount' => $jobs_edit[$i] * 240000
                ]);
            }
        }
        foreach($fixed_costs as $cost)
        {
            $month_fixed_costs_edits = $request->get('month_fixed_costs' . $cost->id);
                for($i=0; $i<$project->term; $i++)
                {
                    $cost->month_costs[$i]->update([
                        'amount' => $month_fixed_costs_edits[$i]
                    ]);
                }
        }
        foreach($variable_costs as $cost)
        {
            $month_variable_costs_edits = $request->get('month_variable_costs' . $cost->id);
                for($i=0; $i<$project->term; $i++)
                {
                    $cost->month_costs[$i]->update([
                        'amount' => $month_variable_costs_edits[$i]
                    ]);
                }
        }
        $fixedCosts = Cost::where('project_id', $project->id)->where('type', 'fixed')->get();
        $variableCosts = Cost::where('project_id', $project->id)->where('type', 'variable')->get();
        return view('project', ['fixedCosts' => $fixedCosts, 'variableCosts'=>$variableCosts, 'project'=>$project]);



    }
    public function store(Request $request)
    {
        $newProject = Project::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'term' => $request->input('term'),
        ]);

        // $newProjectFixedCosts = $newProject->costs()->create([
        //     'name' => 'test',
        //     'amount' => 100,
        //     'type' => 'fixed'
        // ]);
        // $newProjectVariableCosts = $newProject->costs()->create([
        //     'name' => 'test',
        //     'amount' => 100,
        //     'type' => 'variable'
        // ]);
        $newProjectJob = $newProject->jobs()->create([
            'name' => 'Проект 1',
            'amount' => 10000000,
        ]);
        for($i=1; $i<=$newProject->term; $i++)
        {
        $newProjectJob->month_jobs()->create([
            'job_amount' => 0,
            'amount' => 0,
            'month_order' => $i
        ]);
        }
        // for($i=1; $i<=$newProject->term; $i++)
        // {
        // $newProjectFixedCosts->month_costs()->create([
        //     'amount' => '100000',
        //     'month_order' => $i
        // ]);
        // }
        // for($i=1; $i<=$newProject->term; $i++)
        // {
        // $newProjectVariableCosts->month_costs()->create([
        //     'amount' => '100000',
        //     'month_order' => $i
        // ]);
        // }
        return view('dashboard');
    }
}
