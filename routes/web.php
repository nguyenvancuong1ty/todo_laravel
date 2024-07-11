<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\VerificationController;

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

Route::get('/access-denied', function()  {
    return view('error.access_denied');
})->name('error.access.denied')->middleware('auth'); 

Route::get('/send-mail', [SendMailController::class, 'index']);
Route::get('mail/very_success', function() {return view('mail/very_success');})->name('mail.very_success');

//mail
Route::controller(VerificationController::class)->group(function() {
    Route::get('/email/verify', 'notice')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
    Route::post('/email/resend', 'resend')->name('verification.resend');
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
    Route::get('/login',[UserController::class, 'getLogin'])->name("auth.getLogin")->withoutMiddleware('auth');
    Route::post('/login',[UserController::class, 'postLogin'])->name("auth.postLogin")->withoutMiddleware('auth');
    Route::get('/user/all',[UserController::class, 'index'])->name("auth.listUses");
    Route::get('/register',[UserController::class, 'getRegister'])->name("auth.getRegister")->withoutMiddleware('auth');
    Route::post('/register',[UserController::class, 'postRegister'])->name("auth.postRegister")->withoutMiddleware('auth');
    Route::post('/logout',[UserController::class, 'postLogout'])->name("auth.postLogout")->withoutMiddleware('auth');
});

//Category Route
Route::group(['prefix' => 'cg'], function () { 
    Route::get('/category', [CategoryController::class, 'index'])->name('category.Index'); 
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.getCreate');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.postCreate');
    Route::get('/category/update/{id}', [CategoryController::class, 'show'])->name('category.getUpdate');
    Route::post('/category/update', [CategoryController::class, 'edit'])->name('category.postUpdate');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

//Post Route 
Route::get('/post/create', [PostController::class, 'create'])->name('post.getCreate')->middleware('verified');
Route::post('/post/create', [PostController::class, 'store'])->name('post.postCreate')->middleware('verified');
Route::get('/post/update/{id}', [PostController::class, 'show'])->name('post.getUpdate')->middleware('verified');
Route::post('/post/update', [PostController::class, 'edit'])->name('post.postUpdate')->middleware('verified');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy')->middleware('verified');
Route::get('/post/{status}', [PostController::class, 'index'])->name('post.index')->middleware('verified');

