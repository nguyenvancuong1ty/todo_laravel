<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
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
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'getCreate']);
Route::post('/jobs/create', [JobController::class, 'postCreate'])->name('job.postCreate');
Route::get('/job/update/{id}', [JobController::class, 'show']);
Route::post('/job/update', [JobController::class, 'edit'])->name('job.postUpdate');
Route::get('/job/delete/{id}', [JobController::class, 'destroy'])->name('job.destroy');