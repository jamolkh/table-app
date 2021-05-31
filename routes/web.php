<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCostController;

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
Route::get('/form', function () {
    return view('form');
});
Route::get('/dashboard', [ProjectController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard1',[CostController::class, 'variable_costs'])->middleware(['auth'])->name('view.variable_costs');
Route::get('/dashboard2',[CostController::class, 'fixed_costs' ])->middleware(['auth'])->name('view.fixed_costs');
Route::post('/costs',[CostController::class, 'store'])->middleware(['auth'])->name('store.costs');
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.view');
Route::post('/projects',[ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');
Route::get('/projects/{project:slug}/costs', [ProjectCostController::class, 'index'])->name('project.costs.index');
Route::get('/form1', function(){
    return view('form1');
})->name('form1');
Route::get('/form', function(){
    return view('form');
})->name('form');




Route::get('/business-plans', function(){
    return view('business-plans');
})->middleware(['auth'])->name('business-plans');



require __DIR__.'/auth.php';
