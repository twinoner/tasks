<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;

use App\Models\Task;

Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);
Route::resource('products', ProductController::class);

Route::get('/', function () {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
});

Route::group(['prefix' => 'products'], function () {
    // Route::post('/', ProductController::class.'@store');
});