<?php

namespace App\Http\Controllers;
use App\Models\FixedCosts;

use Illuminate\Http\Request;

class FixedCostsController extends Controller
{
    public function index()
    {
        $fixedCosts = FixedCosts::all();

        return view('dashboard1', ['variableCosts' => $fixedCosts, 'title' => 'Постоянные Затраты', 'header'=>'Ресурсы']);
    }
}
