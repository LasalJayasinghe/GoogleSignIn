<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLogin;

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

// Route::get(‘google’,function(){

//     Return view(‘googleAuth’);
    
//     });
    
    Route::get('auth/google', 'App\Http\Controllers\GoogleLogin@redirectToGoogle');
    Route::get('auth/google/callback', 'App\Http\Controllers\GoogleLogin@handleGoogleCallback');

    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/old', 'App\Http\Controllers\HomeController@old')->name('old');
    Route::get('/new', 'App\Http\Controllers\HomeController@new')->name('new');