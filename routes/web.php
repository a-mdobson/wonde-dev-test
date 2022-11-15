<?php

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
    return view('layouts.app');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\ApiCallsController::class, 'schoolIndex'])->name('home');
Route::get('/employees/{id}/classes', [App\Http\Controllers\ApiCallsController::class, 'classesForEmployee'])->name('employeeClasses');
Route::get('/class/{id}', [App\Http\Controllers\ApiCallsController::class, 'studentsInClass'])->name('classView');


