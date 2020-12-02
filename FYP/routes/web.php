<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [HomeController::class,'index'])->name('home');//Display homepage
Route::post('/', [HomeController::class,'store']);//Post feedback form

Auth::routes();//Authentication routes. php artisan route:list to view 

Route::get('/admin', [PostsController::class,'index'])->name('admin');//Display admin dashboard

Route::get('/admin/create', [PostsController::class,'create'])->name('posts');//Display create post form
Route::post('/admin/create', [PostsController::class,'store']);//Post form created

Route::get('/admin/posts/{id}', [PostsController::class,'show'])->name('show');//Display post content

Route::post('/admin/posts/{id}', [PostsController::class,'destroy'])->name('destroy');//Delete post content entirely

Route::put('/admin/posts/{id}', [PostsController::class,'update'])->name('update');//Commit update of post content

Route::get('/admin/posts/{id}/edit', [PostsController::class,'edit'])->name('edit');//Display editable post form

Route::get('/admin/blog', function () { return view('blog'); })->name('blog');
Route::get('main', function () {
    return view('main');
});
