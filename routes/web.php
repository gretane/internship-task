<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//project. later try with resource
Route::group(['prefix' => 'projects'], function(){
    Route::get('', [ProjectController::class, 'index'])->name('project.index');
    Route::get('create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('update/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::post('delete/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('show/{project}', [ProjectController::class, 'show'])->name('project.show');
   });

//student. later try with resource

Route::group(['prefix' => 'students'], function(){
    Route::get('', [StudentController::class, 'index'])->name('student.index');
    Route::get('create', [StudentController::class, 'create'])->name('student.create');
    Route::post('store', [StudentController::class, 'store'])->name('student.store');
    Route::get('edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('update/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::post('delete/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('show/{student}', [StudentController::class, 'show'])->name('student.show');
});

