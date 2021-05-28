<?php

namespace App\Http\Controllers;

use App\Models\Costs;
use Illuminate\Http\Request;

class CostsController extends Controller
{
    public function index()
    {
        $costs = Costs::all();

        return view('dashboard1', ['costs' => $costs]);
    }

    public function fixed_costs()
    {
        $costs = Costs::where('type', 'fixed')->get();
        return view('costs', ['costs' => $costs]);
    }
    public function variable_costs()
    {
        $costs = Costs::where('type', 'variable')->get();
        return view('costs', ['costs' => $costs]);
    }
}
