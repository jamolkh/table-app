<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        Project::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'term' => $request->input('term'),
        ]);
        return view('dashboard');
    }
}
