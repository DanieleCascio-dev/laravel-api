<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','verified'])
->name('admin.')
->prefix('admin')
->group(function() {
    route::resource('projects', ProjectController::class)->parameters(['projects'=>'project:slug']);
    route::resource('types',TypeController::class)->parameters(['types'=>'type:slug']);
    route::resource('technologies',TechnologyController::class);
    route::get('/',[DashboardController::class,'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
