<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

//Job Route
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'getCreate']);
Route::post('/jobs/create', [JobController::class, 'postCreate'])->name('job.postCreate');
Route::get('/job/update/{id}', [JobController::class, 'show']);
Route::post('/job/update', [JobController::class, 'edit'])->name('job.postUpdate');
Route::get('/job/delete/{id}', [JobController::class, 'destroy'])->name('job.destroy');

//User Route
Route::group(['prefix' => 'auth'], function () {
    Route::get('/user/all',[UserController::class, 'index'])->name("auth.listUses");
    Route::get('/register',[UserController::class, 'getRegister'])->name("auth.getRegister");
    Route::post('/register',[UserController::class, 'postRegister'])->name("auth.postRegister");
});

//Category Route
Route::group(['prefix' => 'cg'], function () { 
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/create', [CategoryController::class, 'getCreate']);
    Route::post('/category/create', [CategoryController::class, 'postCreate'])->name('category.postCreate');
    Route::get('/category/update/{id}', [CategoryController::class, 'show']);
    Route::post('/category/update', [CategoryController::class, 'edit'])->name('category.postUpdate');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});
//Post Route
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'getCreate']);
Route::post('/post/create', [PostController::class, 'postCreate'])->name('post.postCreate');
Route::get('/post/update/{id}', [PostController::class, 'show']);
Route::post('/post/update', [PostController::class, 'edit'])->name('post.postUpdate');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');