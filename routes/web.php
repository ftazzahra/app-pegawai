<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalariesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees',EmployeeController::class);
Route::resource('departments',DepartmentsController::class);
Route::resource('positions',PositionsController::class);
Route::resource('attendance',AttendanceController::class);
Route::resource('salaries',SalariesController::class);
