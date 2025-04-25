<?php

use App\Http\Controllers\AjaxTagController;
use App\Http\Controllers\front\HomeController as FrontHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\front\PostController As FrontPostController;
use App\Http\Controllers\UserController;



Route::get('/', [FrontHomeController::class, 'index'])->name('front.home');
Route::get('/about', [FrontHomeController::class, 'about'])->name('front.about');
Route::get('/contact', [FrontHomeController::class, 'contact'])->name('front.contact');
Route::post('/contact',[FrontHomeController::class,'SendMessage'])->name('SendMail');
Route::get('search', [FrontPostController::class, 'search'])->name('front.search');

Route::middleware('auth')->group(function () {


    Route::get('posts', [PostController::class, 'view'])->name('posts.view');
    Route::get('posts/export', [PostController::class, 'export'])->name('posts.export');
    Route::get('posts/show/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/add', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');



    Route::resource('users', UserController::class)->middleware('can:admin-control');
    Route::resource('tags', TagController::class)->middleware('can:admin-control');
    Route::get('users/posts/{id}', [UserController::class, 'posts'])->name('users.posts');
    Route::resource('ajax-tags',AjaxTagController::class);
});
Auth::routes();

// Route::get('home', [HomeController::class, 'index'])->name('home');
