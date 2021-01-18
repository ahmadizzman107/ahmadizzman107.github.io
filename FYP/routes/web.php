<?php

use App\Http\Controllers\EditAboutController;
use App\Http\Controllers\EditClientsController;
use App\Http\Controllers\EditServicesController;
use App\Http\Controllers\EditFooterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ShowEventController;
use App\Http\Controllers\ValidationController;

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
// HOMEPAGE
Route::get('/', [HomeController::class,'index'])->name('home');//Display homepage
Route::post('/', [HomeController::class,'store']);//Post feedback form

// ADMIN AUTH
Auth::routes();//Authentication routes. php artisan route:list to view 

// ADMIN CRUD POST
Route::get('/admin', [PostsController::class,'index'])->name('admin');//Display admin dashboard

Route::get('/admin/create', [PostsController::class,'create'])->name('posts');//Display create post form
Route::post('/admin/create', [PostsController::class,'store']);//Post form created

Route::get('/admin/posts/{id}', [PostsController::class,'show'])->name('show');//Display post content

Route::post('/admin/posts/{id}', [PostsController::class,'destroy'])->name('destroy');//Delete post content entirely

Route::put('/admin/posts/{id}', [PostsController::class,'update'])->name('update');//Commit update of post content

Route::get('/admin/posts/{id}/edit', [PostsController::class,'edit'])->name('edit');//Display editable post form

Route::get('/admin/blog', function () { return view('blog'); })->name('blog');
Route::get('rating-form', function () {return view('posts.rating.create');})->name('rating-form');

// Event Display and Registration
Route::get('show-event/{id}', [ShowEventController::class, 'show'])->name('show-event');//Display event content - similar to 'show'
Route::get('create-event/{id}', [ShowEventController::class, 'create'])->name('create-event');//Display event content - similar to 'show'
Route::post('create-event/{id}', [ShowEventController::class, 'store'])->name('store-register');//Store participant registration

// ADMIN Registration Validation
Route::get('index-validate', [ValidationController::class, 'index'])->name('index-validate');//Display list of open events
Route::get('show-validate/{id}', [ValidationController::class, 'show'])->name('show-validate');//Display list of participant based on registered event
Route::delete('show-validate/{id}', [ValidationController::class, 'destroy'])->name('delete-validate');//Delete participant registration
Route::put('index-validate', [ValidationController::class, 'broadcast'])->name('email-validate');//Email to validated participants
Route::get('show-detail/{id}', [ValidationController::class, 'showDetails'])->name('show-detail');//Display details of participants registration
Route::put('show-detail/{id}', [ValidationController::class, 'validateReceipt'])->name('validate');//Update validation

// Post Event Rating
Route::get('index-rating', [RatingController::class, 'index'])->name('index-rating');//Display list of post-events
Route::get('show-rating/{id}', [RatingController::class, 'show'])->name('show-rating');//Display list of ratings based on registered event through participant
Route::delete('show-rating/{id}', [RatingController::class, 'destroy'])->name('delete-rating');//Delete participant ratings on registered event
Route::get('detail-rating/{id}', [RatingController::class, 'showDetails'])->name('detail-rating');//Display details of participants registration
Route::put('index-rating', [RatingController::class, 'broadcast'])->name('email-rating');//Email to all registered participants

// ADMIN CRUD About
Route::get('edit-about', [EditAboutController::class, 'edit'])->name('edit-about');//Display edit form for About Us section
Route::put('edit-about', [EditAboutController::class, 'update'])->name('update-about');//Commit update of About Us section

// ADMIN CRUD Services
Route::get('edit-services', [EditServicesController::class, 'edit'])->name('edit-services');//Display edit form for Services section
Route::put('edit-services', [EditServicesController::class, 'update'])->name('update-services');//Commit update of Services section

// ADMIN CRUD Client
Route::get('index-client', [EditClientsController::class, 'index'])->name('index-client');//Display lists of Clients
Route::get('create-client', [EditClientsController::class, 'create'])->name('create-client');//Display create form for Clients section
Route::post('create-client', [EditClientsController::class, 'store'])->name('store-client');//Store client information
Route::get('edit-client/{id}', [EditClientsController::class, 'edit'])->name('edit-client');//Display edit form for Clients section
Route::put('edit-client/{id}', [EditClientsController::class, 'update'])->name('update-client');//Commit update of Clients section
Route::delete('edit-client/{id}', [EditClientsController::class, 'destroy'])->name('destroy-client');//Delete client content

// ADMIN CRUD Footer
Route::get('edit-footer', [EditFooterController::class, 'edit'])->name('edit-footer');//Display edit form for Footer section
Route::put('edit-footer', [EditFooterController::class, 'update'])->name('update-footer');//Commit update of Footer section