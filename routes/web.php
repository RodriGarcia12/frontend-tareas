<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get("/createTask", function () {
    return view("createTask");
});
Route::post("/createTask",[TaskController::class,"Create"]);

Route::get("/loginUser", function () {
    return view("loginUser");
});
Route::post("/loginUser",[UserController::class,"Login"]);

Route::get("/registerUser", function () {
    return view("registerUser");
});
Route::post("/registerUser",[UserController::class,"Register"]);

Route::get("/task",[TaskController::class,"Read"]);
Route::get("/task/{d}",[TaskController::class,"GetTask"]);
Route::get("/deleteTask/{d}",[TaskController::class,'Delete']);
