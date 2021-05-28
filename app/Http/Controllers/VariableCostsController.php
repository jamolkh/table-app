<?php

namespace App\Http\Controllers;

use App\Models\VariableCosts;
use Illuminate\Http\Request;

class VariableCostsController extends Controller
{
    public function index()
    {
        $variableCosts = VariableCosts::all();

        return view('dashboard1', ['variableCosts' => $variableCosts, 'title' => 'Переменные Затраты', 'header' => 'Люди']);
    }
}
