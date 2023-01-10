<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;

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

Route::get('/employees',[employeeController::class,'index'])->name('employees.index');
Route::get('/employees/create',[employeeController::class,'create'])->name('employees.create');

Route::post('/employees',[employeeController::class,'store'])->name('employees.store');


