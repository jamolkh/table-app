<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Project;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function index()
    {
        $costs = Cost::all();

        return view('dashboard1', ['costs' => $costs]);
    }

    public function fixed_costs()
    {
        $costs = Cost::where('type', 'fixed')->get();
        return view('costs', ['costs' => $costs]);
    }
    public function variable_costs()
    {
        $costs = Cost::where('type', 'variable')->get();
        return view('costs', ['costs' => $costs]);
    }

    public function destroy(Project $project, Cost $cost)
    {
        $cost->delete();
        $fixedCosts = Cost::where('project_id', $project->id)->where('type', 'fixed')->get();
        $variableCosts = Cost::where('project_id', $project->id)->where('type', 'variable')->get();
        return view('project', ['fixedCosts' => $fixedCosts, 'variableCosts'=>$variableCosts, 'project'=>$project]);
    }

    public function store(Project $project, Request $request)
    {

        $cost = Cost::create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
            'project_id' => $project->id
        ]);
        for($i=1; $i<=$project->term; $i++)
        {
        $cost->month_costs()->create([
            'amount' => '0',
            'month_order' => $i
        ]);
        }
        $fixedCosts = Cost::where('project_id', $project->id)->where('type', 'fixed')->get();
        $variableCosts = Cost::where('project_id', $project->id)->where('type', 'variable')->get();
        return view('project', ['fixedCosts' => $fixedCosts, 'variableCosts'=>$variableCosts, 'project'=>$project]);
    }

    public function create(Project $project)
    {
        return view('form', ['project'=>$project]);
    }
}
