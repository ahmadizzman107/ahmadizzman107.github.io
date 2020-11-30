<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resource('/','WelcomeController');
Route::post('/page/{slug}','WelcomeController@showPage');

Auth::routes();
Route::get('/admin', 'HomeController@index')->name('admin');
Route::resource('admin/posts','PostsController');
Auth::routes();
Route::get('/admin/blog', function () { return view('blog'); })->name('blog');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::view('/','home');

Route::get('/posts',function(){
	return view('posts.create');
});