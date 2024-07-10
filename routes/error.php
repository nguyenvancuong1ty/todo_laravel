<?php

use Illuminate\Support\Facades\Route;

//Error
// Route::group(['prefix' => 'error'], function () {
    
// });
Route::get('/access-denied', function()  {
    return view('error.access_denied');
})->name('error.access.denied'); 