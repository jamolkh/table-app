<?php

namespace App\Http\Controllers;

use App\Models\Cost;
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
    public function store(Request $request)
    {

        Cost::create([
            'name' => $request->input('name'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type')
        ]);
        return redirect()->route('view.variable_costs');
    }
}
