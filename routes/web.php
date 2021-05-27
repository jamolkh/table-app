<?php

use App\Http\Controllers\VariableCostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard1',[VariableCostsController::class, 'index' ])->middleware(['auth'])->name('dashboard1');
Route::get('/business-plans', function(){
    return view('business-plans');
})->middleware(['auth'])->name('business-plans');
require __DIR__.'/auth.php';
