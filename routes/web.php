<?php

use App\Http\Controllers\CalculationController;
use App\Http\Controllers\PlansController;
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
    return view('index');
})->name('home');

Route::prefix('planos')->group(function(){
    Route::get('fale-mais', [PlansController::class, 'index'])->name('plans.index');
    Route::get('comparativos/{origin}/{destination}/{minutes}/{plan}', [CalculationController::class, 'calculate'])->name('calculate');
});
