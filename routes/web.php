<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;


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
Route::get('/tuandat',[WelcomeController::class,'index'])->name('index');
// Route::get('/', [WelcomeController::class, 'index'])->name('index');

// To blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// to store blog post to the DB
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');
// To create blog
Route::get('/blog/create-blog',[BlogController::class,'create'])->name('blog.create')->middleware('auth');

// To single blog post
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// To edit blog
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
// To update blog
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
// To dele blog
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

// Category Resource
Route::resource('/categories', CategoryController::class);

// To about page
Route::get('/about', function(){
    return view('about');
})->name('about');

// To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
 // To Send data to email.
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// To dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
