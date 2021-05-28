<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CostsController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/dashboard1',[CostsController::class, 'variable_costs'])->middleware(['auth'])->name('view.variable_costs');
Route::get('/dashboard2',[CostsController::class, 'fixed_costs' ])->middleware(['auth'])->name('view.fixed_costs');



Route::get('/business-plans', function(){
    return view('business-plans');
})->middleware(['auth'])->name('business-plans');



require __DIR__.'/auth.php';
