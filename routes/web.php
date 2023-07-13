<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/users',UserController::class);
    Route::delete('delete-all', [App\Http\Controllers\Usercontroller::class,'removeMulti']);
});

Route::group(['middleware' => ['auth:web'],'namespace' => 'App\Http\Controllers'], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'customer.auth'], function () {
    Route::resource('/posts',PostController::class);
    Route::delete('delete-all-post', [App\Http\Controllers\PostController::class,'removeMultiPost']);
    Route::delete('/images/{image}', [App\Http\Controllers\PostController::class,'delete'])->name('images.delete');
});
