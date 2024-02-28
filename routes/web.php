<?php

use App\Http\Controllers\Categories\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\Users\UsersController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jobs/single/{id}',[JobsController::class, 'single'])->name('single.job');
Route::post('/jobs/save',[JobsController::class, 'saveJob'])->name('save.job');
Route::post('/jobs/apply',[JobsController::class, 'jobApply'])->name('apply.job');

Route ::get('/categories/single/{name}',[CategoriesController::class,'singleCategory'])->name('categories.single');

Route::get('/users/profile',[UsersController::class,'profile'])->name('profile');

//this is Sohan
